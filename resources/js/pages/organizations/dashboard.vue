<script lang="ts" setup>
import { Button } from "@/components/ui/button";
import {
    Card,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { PageProps } from "@/types";
import { Link, usePage } from "@inertiajs/vue3";
import { ArrowLeft, ArrowRight, Building, LogOut, Vote } from "lucide-vue-next";

defineProps<{
    organization: Organization;
}>();

const page = usePage<PageProps>();
const user = page.props.auth.user;
</script>

<template>
    <div class="min-h-dvh flex items-center justify-center p-4">
        <Card class="max-w-screen-md w-full divide-y">
            <CardHeader>
                <CardTitle class="font-extrabold">PEMIRA</CardTitle>
                <CardDescription>Fakultas Ilmu Komputer 2025</CardDescription>
            </CardHeader>
            <div class="grid grid-cols-2 divide-x">
                <CardHeader class="p-6">
                    <CardDescription class="flex items-center justify-between">
                        Organisasi
                        <Building class="size-4" />
                    </CardDescription>
                    <CardTitle class="text-xl">{{
                        organization.name
                    }}</CardTitle>
                </CardHeader>
                <CardHeader class="p-6">
                    <CardDescription class="flex items-center justify-between">
                        Surat Suara
                        <Vote class="size-4" />
                    </CardDescription>
                    <CardTitle class="text-xl">65</CardTitle>
                </CardHeader>
            </div>
            <div class="w-full overflow-auto whitespace-nowrap">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[150px] pl-6"> NPM </TableHead>
                            <TableHead>Username</TableHead>
                            <TableHead class="pr-6 text-right">
                                Waktu
                            </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-if="false">
                            <TableCell class="text-center" colspan="4">
                                No data yet
                            </TableCell>
                        </TableRow>
                        <TableRow v-for="i in Array(5)">
                            <TableCell class="pl-6"> 22081010158 </TableCell>
                            <TableCell>
                                22081010158 Heaven Ade Aldrico
                            </TableCell>
                            <TableCell class="pr-6 text-right">
                                2021-10-10 10:10:10
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
            <CardFooter
                class="px-6 py-2 flex items-center justify-between gap-4"
            >
                <Button variant="outline" class="w-full md:w-fit gap-1">
                    <ArrowLeft class="size-4" />
                    Sebelumnya
                </Button>
                <Button class="w-full md:w-fit gap-1">
                    Selanjutnya
                    <ArrowRight class="size-4" />
                </Button>
            </CardFooter>
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
                <Link
                    :href="
                        user.type === 'admin'
                            ? route('admin.dashboard')
                            : route('index')
                    "
                    class="w-full md:w-fit"
                >
                    <Button variant="outline" class="w-full gap-1">
                        <LogOut class="size-4" />
                        Kembali
                    </Button>
                </Link>
            </CardFooter>
        </Card>
    </div>
</template>
