<script lang="ts" setup>
import ConfirmationDialog from "@/components/ConfirmationDialog.vue";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Skeleton } from "@/components/ui/skeleton";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps<{
    organization: Organization;
    details: BallotDetail[];
}>();

const submit = () => {
    router.post(
        route("vote.result.confirm", {
            organization: props.organization.id,
        })
    );
};
</script>

<template>
    <div class="min-h-dvh flex justify-center p-4">
        <div class="max-w-screen-xl w-full space-y-4">
            <Card>
                <CardHeader class="text-center">
                    <CardTitle>Konfirmasi Pilihan</CardTitle>
                    <CardDescription>
                        Pastikan pilihanmu sudah sesuai sebelum melanjutkan!
                    </CardDescription>
                    <div class="flex justify-center gap-2">
                        <Link
                            :href="
                                route('vote.organization', {
                                    organization: organization.id,
                                })
                            "
                        >
                            <Button variant="outline">Kembali</Button>
                        </Link>
                        <ConfirmationDialog
                            title="Apakah kamu yakin dengan pilihanmu?"
                            description="Pilihanmu tidak dapat diubah setelah ini."
                            @accept="submit"
                        >
                            <Button>Konfirmasi</Button>
                        </ConfirmationDialog>
                    </div>
                </CardHeader>
                <CardContent>
                    <div class="grid grid-cols-5 gap-4">
                        <div
                            v-for="detail in details"
                            class="flex flex-col gap-2"
                        >
                            <CardTitle class="text-center">
                                {{ detail.group?.name }}
                            </CardTitle>
                            <Card>
                                <Skeleton class="w-full aspect-square" />
                                <CardHeader class="text-sm">
                                    <CardTitle class="leading-normal">
                                        {{ detail.candidate?.name_1 }}
                                        <template
                                            v-if="detail.candidate?.name_2"
                                        >
                                            <br />
                                            &
                                            <br />
                                            {{ detail.candidate?.name_2 }}
                                        </template>
                                    </CardTitle>
                                </CardHeader>
                            </Card>
                        </div>
                    </div>
                </CardContent>
            </Card>
        </div>
    </div>
</template>
