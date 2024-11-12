<script lang="ts">
import Select from "@/components/Select.vue";
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import { Label } from "@/components/ui/label";
import { SelectItem } from "@/components/ui/select";
import AdminLayout from "@/layouts/AdminLayout.vue";
import { Edit, Trash2 } from "lucide-vue-next";
import { ref } from "vue";

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
import { Card, CardContent, CardHeader } from "@/components/ui/card";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { User } from "@/types";
import { Link, router } from "@inertiajs/vue3";

const props = withDefaults(
    defineProps<{
        users: Pagination<User>;
        type?: string;
    }>(),
    {
        type: "admin",
    }
);

const type = ref(props.type);

const edit = (user: User) => {
    router.visit(
        route("admin.users.edit", { user, _query: { type: type.value } })
    );
};

const destroy = (user: User) => {
    router.delete(route("admin.users.destroy", { user: user.id }));
};

const prev = () => {
    if (props.users.prev_page_url) {
        router.visit(props.users.prev_page_url, {
            data: { type: type.value },
        });
    }
};

const next = () => {
    if (props.users.next_page_url) {
        router.visit(props.users.next_page_url, {
            data: { type: type.value },
        });
    }
};
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
            <CardHeader class="flex-row justify-between gap-4">
                <div class="flex items-center gap-4">
                    <Label>Type:</Label>
                    <div class="w-32">
                        <Select
                            v-model="type"
                            @change="
                                router.visit(route('admin.users.index'), {
                                    data: { type },
                                })
                            "
                        >
                            <SelectItem value="admin">Admin</SelectItem>
                            <SelectItem value="committee">
                                Committee
                            </SelectItem>
                            <SelectItem value="voter">Voter</SelectItem>
                        </Select>
                    </div>
                </div>
                <Link :href="route('admin.users.create', { _query: { type } })">
                    <Button>Add New</Button>
                </Link>
            </CardHeader>
            <CardContent class="space-y-4">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>NPM</TableHead>
                            <TableHead>Name</TableHead>
                            <TableHead></TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-if="!users.data.length">
                            <TableCell
                                class="text-center text-muted-foreground"
                                colspan="3"
                            >
                                No data yet
                            </TableCell>
                        </TableRow>
                        <TableRow v-for="user in users.data">
                            <TableCell>{{ user.npm }}</TableCell>
                            <TableCell>
                                <div class="flex items-center gap-2">
                                    <Avatar class="size-6">
                                        <AvatarImage
                                            v-if="user.avatar"
                                            :src="user.avatar"
                                        />
                                        <AvatarFallback>
                                            {{ user.name[0] }}
                                        </AvatarFallback>
                                    </Avatar>
                                    {{ user.name }}
                                </div>
                            </TableCell>
                            <TableCell class="flex justify-end gap-2">
                                <Button
                                    size="icon"
                                    variant="outline"
                                    @click="edit(user)"
                                >
                                    <Edit class="size-4" />
                                </Button>
                                <Button
                                    size="icon"
                                    variant="destructive"
                                    @click="destroy(user)"
                                >
                                    <Trash2 class="size-4" />
                                </Button>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
                <div class="flex justify-end gap-2">
                    <Button
                        :disabled="!users.prev_page_url"
                        variant="outline"
                        @click="prev"
                    >
                        Previous
                    </Button>
                    <Button
                        :disabled="!users.next_page_url"
                        variant="outline"
                        @click="next"
                    >
                        Next
                    </Button>
                </div>
            </CardContent>
        </Card>
    </div>
</template>
