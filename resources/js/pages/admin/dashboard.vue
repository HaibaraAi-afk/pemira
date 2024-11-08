<script lang="ts">
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
        name: "BEM Fasilkom",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "BLM",
        name: "BLM Fasilkom",
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
            <div class="grid grid-cols-3 gap-4 *:h-48">
                <Card></Card>
                <Card></Card>
                <Card></Card>
            </div>
            <Card>
                <CardHeader>
                    <CardTitle>Organizations</CardTitle>
                    <CardDescription>Click to Open</CardDescription>
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
