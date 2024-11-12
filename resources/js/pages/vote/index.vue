<script lang="ts" setup>
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
import { Skeleton } from "@/components/ui/skeleton";
import { PageProps } from "@/types";
import { Icon } from "@iconify/vue/dist/iconify.js";
import { Link, usePage } from "@inertiajs/vue3";
import { LogOut } from "lucide-vue-next";
import { ref } from "vue";

const page = usePage<PageProps>();
const user = page.props.auth.user;
const isOpen = ref(false);
</script>

<template>
    <div class="min-h-dvh flex items-center justify-center p-4">
        <div class="max-w-screen-md w-full space-y-4">
            <Card>
                <CardHeader class="space-y-2 border-b text-center text-pretty">
                    <Avatar class="size-24 mx-auto" @click="isOpen = !isOpen">
                        <AvatarImage
                            v-if="user.avatar"
                            :alt="user.name"
                            :src="user.avatar"
                        />
                    </Avatar>
                    <div>
                        <CardDescription>Selamat datang!</CardDescription>
                        <CardTitle>{{ user.name }}</CardTitle>
                    </div>
                </CardHeader>
                <CardContent v-if="isOpen" class="p-6 space-y-4 border-b">
                    <div class="text-center">
                        <CardTitle>Organisasi</CardTitle>
                        <CardDescription>
                            Pilih yang ingin kamu vote
                        </CardDescription>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <Card class="overflow-hidden divide-y">
                            <Skeleton
                                class="w-full aspect-square rounded-b-none"
                            />
                            <CardHeader class="p-4">
                                <CardTitle class="text-center">
                                    BEM FIK
                                </CardTitle>
                            </CardHeader>
                        </Card>
                        <Card class="overflow-hidden divide-y">
                            <Skeleton
                                class="w-full aspect-square rounded-b-none"
                            />
                            <CardHeader class="p-4">
                                <CardTitle class="text-center"
                                    >BLM FIK</CardTitle
                                >
                            </CardHeader>
                        </Card>
                        <Card class="overflow-hidden divide-y">
                            <Skeleton
                                class="w-full aspect-square rounded-b-none"
                            />
                            <CardHeader class="p-4">
                                <CardTitle class="text-center"
                                    >HIMASIFO</CardTitle
                                >
                            </CardHeader>
                        </Card>
                        <Card class="overflow-hidden divide-y">
                            <Skeleton
                                class="w-full aspect-square rounded-b-none"
                            />
                            <CardHeader class="p-4">
                                <CardTitle class="text-center"
                                    >HIMASADA</CardTitle
                                >
                            </CardHeader>
                        </Card>
                        <Card class="overflow-hidden divide-y">
                            <Skeleton
                                class="w-full aspect-square rounded-b-none"
                            />
                            <CardHeader class="p-4">
                                <CardTitle class="text-center"
                                    >HIMABISDI</CardTitle
                                >
                            </CardHeader>
                        </Card>
                    </div>
                </CardContent>
                <template v-else>
                    <CardContent class="p-6 border-b text-center space-y-2">
                        <div class="text-4xl">🤩</div>
                        <div>
                            <CardTitle>Waduh.. Kamu rajin sekali!</CardTitle>
                            <CardDescription>
                                Maaf, pemilihan masih belum dibuka nih.
                            </CardDescription>
                        </div>
                    </CardContent>
                    <CardContent class="p-6 border-b text-center space-y-4">
                        <div>
                            <CardTitle class="text-2xl font-extrabold">
                                TAPI TUNGGU!
                            </CardTitle>
                            <CardDescription>
                                Pamer ke sosmed dulu gasi kalo udah siap vote?!
                            </CardDescription>
                        </div>
                        <div class="flex items-center justify-center gap-4">
                            <Icon
                                icon="tabler:arrow-wave-right-down"
                                class="size-16 text-orange-500 -rotate-[24deg]"
                            />
                            <Button size="lg" class="text-lg font-extrabold">
                                🔥SHARE🔥
                            </Button>
                            <Icon
                                icon="tabler:arrow-wave-left-up"
                                class="size-16 text-orange-500 -rotate-[24deg]"
                            />
                        </div>
                    </CardContent>
                </template>
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
