<script lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";

export default {
    layout: AdminLayout,
};
</script>

<script lang="ts" setup>
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbList,
    BreadcrumbPage,
} from "@/components/ui/breadcrumb";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
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
import { User } from "@/types";
import { Link } from "@inertiajs/vue3";

defineProps<{
    users: User[];
}>();
</script>

<template>
    <Teleport defer to="#header">
        <Breadcrumb>
            <BreadcrumbList>
                <BreadcrumbItem>
                    <BreadcrumbPage>Users</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </Teleport>
    <div class="flex-1">
        <Card>
            <CardHeader>
                <div class="flex justify-between gap-4">
                    <div class="space-y-1.5">
                        <CardTitle>Users</CardTitle>
                        <CardDescription>
                            Admin and committee users
                        </CardDescription>
                    </div>
                    <Link :href="route('users.create')">
                        <Button>Add New</Button>
                    </Link>
                </div>
            </CardHeader>
            <CardContent>
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[150px]">Type</TableHead>
                            <TableHead>Organization</TableHead>
                            <TableHead>NPM</TableHead>
                            <TableHead>Name</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-if="!users.length">
                            <TableCell class="text-center" colspan="4">
                                No data yet
                            </TableCell>
                        </TableRow>
                        <TableRow v-for="user in users" :key="user.id">
                            <TableCell>{{ user.type.toUpperCase() }}</TableCell>
                            <TableCell>{{ user.org_code }}</TableCell>
                            <TableCell>{{ user.npm }}</TableCell>
                            <TableCell>{{ user.name }}</TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </CardContent>
        </Card>
    </div>
</template>
