<script setup lang="ts">
import ConfirmationDialog from "@/components/ConfirmationDialog.vue";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Link, useForm } from "@inertiajs/vue3";
import { BookImage } from "lucide-vue-next";
import { reactive, ref } from "vue";

const form = useForm<{
    ktm: File | undefined;
    verification: File | undefined;
}>({
    ktm: undefined,
    verification: undefined,
});

const urls = reactive<{
    ktm: string | undefined;
    verification: string | undefined;
}>({
    ktm: "",
    verification: "",
});

const ktmInput = ref<HTMLInputElement | null>(null);
const verificationInput = ref<HTMLInputElement | null>(null);

const handleInput = (e: Event) => {
    const target = e.target as HTMLInputElement;

    if (target === ktmInput.value) {
        form.ktm = target.files?.[0];

        if (form.ktm) {
            const reader = new FileReader();
            reader.onload = (e) => {
                urls.ktm = e.target?.result as string;
            };
            reader.readAsDataURL(form.ktm);
        }
    } else {
        form.verification = target.files?.[0];

        if (form.verification) {
            const reader = new FileReader();
            reader.onload = (e) => {
                urls.verification = e.target?.result as string;
            };
            reader.readAsDataURL(form.verification);
        }
    }
};

const submit = () => {
    if (form.ktm && form.verification) {
        form.post(route("verification.store"));
    }
};
</script>

<template>
    <input
        ref="ktmInput"
        type="file"
        class="absolute -top-full -left-full"
        accept="image/*"
        @change="handleInput"
    />
    <input
        ref="verificationInput"
        type="file"
        class="absolute -top-full -left-full"
        accept="image/*"
        @change="handleInput"
    />
    <div class="p-4">
        <div class="max-w-md mx-auto w-full space-y-4">
            <Card>
                <CardHeader>
                    <CardTitle>Proses Verifikasi</CardTitle>
                    <CardDescription>
                        Pastikan foto KTM dan wajah kamu terlihat jelas yaa!
                    </CardDescription>
                </CardHeader>
            </Card>
            <Card>
                <CardHeader>
                    <CardTitle>Foto KTM</CardTitle>
                    <CardDescription>
                        Pastikan foto KTM kamu terlihat jelas yaa!
                    </CardDescription>
                </CardHeader>
                <CardContent v-if="urls.ktm">
                    <img
                        :src="urls.ktm"
                        class="w-full object-cover rounded-lg"
                    />
                </CardContent>
                <CardFooter class="grid gap-2">
                    <Button
                        :variant="form.ktm ? 'outline' : 'default'"
                        class="gap-1"
                        @click="ktmInput?.click()"
                    >
                        <BookImage class="size-4" />
                        Ambil gambar
                    </Button>
                </CardFooter>
            </Card>
            <Card>
                <CardHeader>
                    <CardTitle>Foto KTM dan Wajah</CardTitle>
                    <CardDescription>
                        Pastikan foto KTM dan wajah kamu terlihat jelas yaa!
                    </CardDescription>
                </CardHeader>
                <CardContent v-if="urls.verification">
                    <img
                        :src="urls.verification"
                        class="w-full object-cover rounded-lg"
                    />
                </CardContent>
                <CardFooter class="grid gap-2">
                    <Button
                        :variant="form.verification ? 'outline' : 'default'"
                        class="gap-1"
                        @click="verificationInput?.click()"
                    >
                        <BookImage class="size-4" />
                        Ambil gambar
                    </Button>
                </CardFooter>
            </Card>
            <div class="flex flex-row-reverse justify-between gap-2">
                <Button v-if="!form.ktm || !form.verification" disabled>
                    Proses
                </Button>
                <ConfirmationDialog
                    v-else
                    title="Apakah kamu yakin?"
                    description="Kedua foto akan dikirimkan untuk proses verifikasi dari panitia"
                    @accept="submit"
                >
                    <Button>Proses</Button>
                </ConfirmationDialog>
                <Link :href="route('index')">
                    <Button variant="outline">Kembali</Button>
                </Link>
            </div>
        </div>
    </div>
</template>
