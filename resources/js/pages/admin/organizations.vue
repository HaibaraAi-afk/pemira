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
import { Card } from "@/components/ui/card";
import { Link } from "@inertiajs/vue3";
import { Plus } from "lucide-vue-next";

const organizations: Organization[] = [
    {
        code: "BEM",
        name: "BEM FASILKOM",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "BLM",
        name: "BLM FASILKOM",
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
                    <BreadcrumbPage>Organizations</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </Teleport>
    <div class="flex-1">
        <div class="grid grid-cols-4 gap-4">
            <Link
                v-for="organization in organizations"
                :href="route('organizations.test')"
            >
                <OrganizationCard
                    :organization="organization"
                    class="cursor-pointer hover:outline"
                />
            </Link>
            <Card
                class="flex items-center justify-center bg-muted text-muted-foreground cursor-pointer hover:outline"
            >
                <Plus />
            </Card>
        </div>
    </div>
</template>
