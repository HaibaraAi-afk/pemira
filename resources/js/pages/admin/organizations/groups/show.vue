<script lang="ts">
import GroupEditCard from "@/components/GroupEditCard.vue";
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import AdminLayout from "@/layouts/AdminLayout.vue";
import { PageProps } from "@/types";
import { Edit, Trash2 } from "lucide-vue-next";

export default {
    layout: AdminLayout,
};
</script>

<script lang="ts" setup>
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Link, router, usePage } from "@inertiajs/vue3";

const props = defineProps<{
    group: Group;
}>();

const page = usePage<PageProps>();
const organization = page.props.organization;

const edit = (candidate: Candidate) => {
    router.visit(
        route("admin.organizations.groups.candidates.edit", {
            organization: organization?.id,
            group: props.group.id,
            candidate: candidate.id,
        })
    );
};

const destroy = (candidate: Candidate) => {
    if (!confirm("Are you sure you want to remove this candidate?")) {
        return;
    }

    router.delete(
        route("admin.organizations.groups.candidates.destroy", {
            organization: organization?.id,
            group: props.group.id,
            candidate: candidate.id,
        })
    );
};
</script>

<template>
    <Teleport defer to="#header">
        <Breadcrumb>
            <BreadcrumbList>
                <BreadcrumbItem>
                    <BreadcrumbLink
                        :href="
                            route('admin.organizations.show', {
                                organization: organization?.id,
                            })
                        "
                    >
                        {{ organization?.name }}
                    </BreadcrumbLink>
                </BreadcrumbItem>
                <BreadcrumbSeparator />
                <BreadcrumbItem>
                    <BreadcrumbPage>{{ group.name }}</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </Teleport>
    <div class="flex-1">
        <div
            class="flex flex-col lg:flex-row items-center lg:items-start gap-4"
        >
            <div class="max-w-sm w-full">
                <GroupEditCard :group="group" />
            </div>
            <div class="w-full flex-1">
                <Card>
                    <CardHeader class="flex-row justify-between gap-4">
                        <div class="space-y-1.5">
                            <CardTitle>Candidates</CardTitle>
                            <CardDescription>Manage candidates</CardDescription>
                        </div>
                        <Link
                            :href="
                                route(
                                    'admin.organizations.groups.candidates.create',
                                    {
                                        organization: organization?.id,
                                        group: props.group.id,
                                    }
                                )
                            "
                        >
                            <Button>Add New</Button>
                        </Link>
                    </CardHeader>
                    <CardContent>
                        <Table>
                            <TableHeader>
                                <TableRow>
                                    <TableHead></TableHead>
                                    <TableHead>Name 1</TableHead>
                                    <TableHead>Name 2</TableHead>
                                    <TableHead></TableHead>
                                </TableRow>
                            </TableHeader>
                            <TableBody>
                                <TableRow v-if="!group.candidates?.length">
                                    <TableCell
                                        class="text-center text-muted-foreground"
                                        colspan="4"
                                    >
                                        No data yet
                                    </TableCell>
                                </TableRow>
                                <TableRow v-for="candidate in group.candidates">
                                    <TableCell>
                                        <div class="flex items-center gap-2">
                                            <Avatar class="size-6">
                                                <AvatarImage
                                                    v-if="candidate.picture"
                                                    :src="candidate.picture"
                                                />
                                                <AvatarFallback>
                                                    {{ candidate.name_1[0] }}
                                                </AvatarFallback>
                                            </Avatar>
                                        </div>
                                    </TableCell>
                                    <TableCell>
                                        {{ candidate.name_1 }}
                                    </TableCell>
                                    <TableCell>
                                        {{ candidate.name_2 }}
                                    </TableCell>
                                    <TableCell class="flex justify-end gap-2">
                                        <Button
                                            size="icon"
                                            variant="outline"
                                            @click="edit(candidate)"
                                        >
                                            <Edit class="size-4" />
                                        </Button>
                                        <Button
                                            size="icon"
                                            variant="destructive"
                                            @click="destroy(candidate)"
                                        >
                                            <Trash2 class="size-4" />
                                        </Button>
                                    </TableCell>
                                </TableRow>
                            </TableBody>
                        </Table>
                    </CardContent>
                </Card>
            </div>
        </div>
    </div>
</template>
