<script lang="ts">
import { Skeleton } from "@/components/ui/skeleton";
import AdminLayout from "@/layouts/AdminLayout.vue";

export default {
    layout: AdminLayout,
};
</script>

<script lang="ts" setup>
import OrganizationCard from "@/components/OrganizationCard.vue";
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbList,
    BreadcrumbPage,
} from "@/components/ui/breadcrumb";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Link } from "@inertiajs/vue3";

const organizations: Organization[] = [
    {
        code: "BEM",
        name: "BEM FIK",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "BLM",
        name: "BLM FIK",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "20",
        name: "HIMASIFO",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "30",
        name: "HIMASADA",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "40",
        name: "HIMABISDI",
        logo: "test",
        is_public: true,
        is_open: false,
    },
];
</script>

<template>
    <Teleport defer to="#header">
        <Breadcrumb>
            <BreadcrumbList>
                <BreadcrumbItem>
                    <BreadcrumbPage>Dashboard</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </Teleport>
    <div class="flex-1">
        <div class="grid gap-4">
            <div class="grid grid-cols-3 gap-4">
                <Card>
                    <CardHeader>
                        <CardDescription>Pemilih Terdaftar</CardDescription>
                        <CardTitle class="text-3xl font-extrabold">
                            100
                        </CardTitle>
                    </CardHeader>
                </Card>
                <Card class="overflow-hidden">
                    <Skeleton class="size-full" />
                </Card>
                <Card class="overflow-hidden">
                    <Skeleton class="size-full" />
                </Card>
            </div>
            <Card>
                <CardHeader>
                    <CardTitle>Organizations</CardTitle>
                    <CardDescription>Manage organizations data</CardDescription>
                </CardHeader>
                <CardContent>
                    <div class="grid grid-cols-4 gap-4">
                        <Link
                            v-for="organization in organizations"
                            :href="route('organizations.test')"
                            class="block"
                        >
                            <OrganizationCard :organization="organization" />
                        </Link>
                    </div>
                </CardContent>
            </Card>
        </div>
    </div>
</template>
