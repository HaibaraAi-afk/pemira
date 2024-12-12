<script lang="ts" setup>
import Flash from "@/components/Flash.vue";
import { Avatar, AvatarImage } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { PageProps } from "@/types";
import { Link, usePage } from "@inertiajs/vue3";
import { LogOut } from "lucide-vue-next";

const props = defineProps<{
    verification: UserVerification | null;
    organizations: Organization[];
}>();

const page = usePage<PageProps>();
const user = page.props.auth.user;
</script>

<template>
    <div class="min-h-dvh flex items-center justify-center p-4">
        <div class="max-w-md w-full space-y-4">
            <Card>
                <CardHeader class="space-y-2 border-b text-center text-pretty">
                    <Avatar class="size-24 mx-auto">
                        <AvatarImage
                            v-if="user.avatar"
                            :alt="user.name"
                            :src="user.avatar"
                            referrerpolicy="no-referrer"
                        />
                    </Avatar>
                    <div class="space-y-1.5">
                        <CardDescription>Selamat datang!</CardDescription>
                        <CardTitle>{{ user.name }}</CardTitle>
                    </div>
                </CardHeader>
                <CardContent
                    v-if="
                        verification === null ||
                        verification.ktm === null ||
                        verification.verification === null
                    "
                    class="p-6 space-y-4 border-b"
                >
                    <div class="text-center space-y-1.5">
                        <CardTitle>Upload KTM</CardTitle>
                        <CardDescription>
                            Sebelum pemilihan silakan upload KTM kamu dulu yaa!
                        </CardDescription>
                    </div>
                    <div class="flex justify-center space-x-4">
                        <Link :href="route('verification')">
                            <Button class="w-full">Selanjutnya</Button>
                        </Link>
                    </div>
                </CardContent>
                <CardContent
                    v-else-if="organizations.length > 0"
                    class="p-6 space-y-4 border-b"
                >
                    <Flash />
                    <div class="text-center">
                        <CardTitle>Organisasi</CardTitle>
                        <CardDescription>
                            Pilih organisasi yang ingin kamu buka
                        </CardDescription>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <Link
                            v-for="organization in organizations"
                            :href="
                                route('vote.organization', {
                                    organization: organization.id,
                                })
                            "
                        >
                            <Card
                                class="overflow-hidden divide-y cursor-pointer hover:outline active:outline"
                            >
                                <img :src="`/storage/${organization.logo}`" />
                                <CardHeader class="p-4">
                                    <CardTitle class="text-center">
                                        {{ organization.name }}
                                    </CardTitle>
                                </CardHeader>
                            </Card>
                        </Link>
                    </div>
                </CardContent>
                <CardContent v-else class="p-6 border-b">
                    <div class="text-center space-y-1.5">
                        <CardTitle>Belum ada pemilihan</CardTitle>
                        <CardDescription>
                            Wah kamu rajin sekali! tunggu info selanjutnya yaa!
                            🤩
                        </CardDescription>
                    </div>
                </CardContent>
                <CardFooter
                    class="p-6 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0"
                >
                    <CardDescription>
                        Butuh bantuan?
                        <a
                            href="https://wa.me/628819305047"
                            target="_blank"
                            class="text-blue-500 underline"
                        >
                            Hubungi kami disini
                        </a>
                    </CardDescription>
                    <Link :href="route('logout')" class="w-full md:w-fit">
                        <Button variant="outline" class="w-full gap-1">
                            <LogOut class="size-4" />
                            Keluar Akun
                        </Button>
                    </Link>
                </CardFooter>
            </Card>
            <Card v-if="user.type === 'admin'" class="max-w-md mx-auto">
                <CardHeader>
                    <CardTitle>Admin</CardTitle>
                    <CardDescription>Kamu punya akses admin</CardDescription>
                </CardHeader>
                <CardFooter class="grid">
                    <Link :href="route('admin.dashboard')">
                        <Button class="w-full">Masuk ke Dashboard</Button>
                    </Link>
                </CardFooter>
            </Card>
        </div>
    </div>
</template>
