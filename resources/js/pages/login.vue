<script setup lang="ts">
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
import { Icon } from "@iconify/vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage<PageProps>();
</script>

<template>
    <div class="min-h-dvh flex items-center justify-center p-4">
        <Card class="max-w-sm w-full">
            <CardHeader class="border-b text-center text-pretty">
                <Skeleton class="size-32 mx-auto rounded-full mb-2" />
                <CardTitle class="text-3xl font-extrabold">PEMIRA</CardTitle>
                <CardTitle>Fakultas Ilmu Komputer 2025</CardTitle>
                <CardDescription>
                    Universitas Pembangunan Nasional "Veteran" Jawa Timur
                </CardDescription>
            </CardHeader>
            <CardContent class="p-6 border-b space-y-2">
                <a :href="route('auth.redirect')" class="block">
                    <Button size="lg" class="w-full gap-2">
                        <Icon icon="fa6-brands:google" />
                        Masuk dengan Google
                    </Button>
                </a>
                <div
                    v-if="page.props.flash"
                    class="text-red-500 text-sm font-medium text-center text-pretty"
                >
                    {{ page.props.flash }}
                </div>
            </CardContent>
            <CardFooter class="p-6">
                <CardDescription>
                    Butuh bantuan?
                    <a
                        href="https://wa.me/628819305047"
                        target="_blank"
                        class="text-blue-500 underline"
                        >Hubungi kami disini</a
                    >
                </CardDescription>
            </CardFooter>
        </Card>
    </div>
</template>
