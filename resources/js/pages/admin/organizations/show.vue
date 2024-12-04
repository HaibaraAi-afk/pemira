<script lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
import { PageProps } from "@/types";

export default {
    layout: AdminLayout,
};
</script>

<script lang="ts" setup>
import OrganizationEditCard from "@/components/OrganizationEditCard.vue";
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
import { Link, usePage } from "@inertiajs/vue3";
import { Layers, Plus } from "lucide-vue-next";

defineProps<{
    groups: Group[];
}>();

const page = usePage<PageProps>();
const organization = page.props.organization;
</script>

<template>
    <Teleport defer to="#header">
        <Breadcrumb>
            <BreadcrumbList>
                <BreadcrumbItem>
                    <BreadcrumbPage>{{ organization?.name }}</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </Teleport>
    <div class="flex-1">
        <div
            class="flex flex-col lg:flex-row items-center lg:items-start gap-4"
        >
            <div class="max-w-sm w-full">
                <OrganizationEditCard
                    v-if="organization"
                    :organization="organization"
                />
            </div>
            <div class="w-full flex-1">
                <Card>
                    <CardHeader class="flex-row justify-between gap-4">
                        <div class="space-y-1.5">
                            <CardTitle>Groups</CardTitle>
                            <CardDescription>Manage groups</CardDescription>
                        </div>
                        <Layers class="size-4 text-muted-foreground" />
                    </CardHeader>
                    <CardContent class="grid xl:grid-cols-2 gap-4">
                        <Link
                            v-for="group in groups"
                            :href="
                                route('admin.organizations.groups.show', {
                                    organization: organization?.id,
                                    group: group.id,
                                })
                            "
                        >
                            <Card class="cursor-pointer hover:outline">
                                <CardHeader>
                                    <CardTitle
                                        class="flex justify-between gap-4"
                                    >
                                        {{ group.name }}
                                        <span
                                            class="text-muted-foreground font-normal"
                                        >
                                            {{ group.ordering }}
                                        </span>
                                    </CardTitle>
                                    <CardDescription>
                                        {{ group.candidates_count ?? 0 }}
                                        Candidates
                                    </CardDescription>
                                </CardHeader>
                            </Card>
                        </Link>
                        <Link
                            :href="
                                route('admin.organizations.groups.create', {
                                    organization: organization?.id,
                                })
                            "
                        >
                            <Card
                                class="min-h-[90px] flex items-center justify-center bg-muted text-muted-foreground cursor-pointer hover:outline"
                            >
                                <Plus class="size-4" />
                            </Card>
                        </Link>
                    </CardContent>
                </Card>
            </div>
        </div>
    </div>
</template>
