<script lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

export default {
    layout: AdminLayout,
};
</script>

<script lang="ts" setup>
import FormMessage from "@/components/FormMessage.vue";
import Select from "@/components/Select.vue";
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { SelectItem } from "@/components/ui/select";

const props = withDefaults(
    defineProps<{
        type?: string;
    }>(),
    {
        type: "admin",
    }
);

const form = useForm({
    type: props.type,
    npm: "",
    email: "",
    name: "",
});
</script>

<template>
    <Teleport defer to="#header">
        <Breadcrumb>
            <BreadcrumbList>
                <BreadcrumbItem class="hidden md:block">
                    <BreadcrumbLink
                        :href="
                            route('admin.users.index', {
                                _query: { type },
                            })
                        "
                    >
                        Users
                    </BreadcrumbLink>
                </BreadcrumbItem>
                <BreadcrumbSeparator class="hidden md:block" />
                <BreadcrumbItem>
                    <BreadcrumbPage>Add New</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </Teleport>
    <div class="flex-1">
        <Card class="max-w-sm">
            <CardHeader>
                <CardTitle>Add New User</CardTitle>
                <CardDescription>Please complete the form</CardDescription>
            </CardHeader>
            <CardContent>
                <form
                    class="space-y-4"
                    @submit.prevent="form.post(route('admin.users.store'))"
                >
                    <div class="space-y-2">
                        <Label>Type</Label>
                        <Select v-model="form.type">
                            <SelectItem value="admin">Admin</SelectItem>
                            <SelectItem value="committee">Committee</SelectItem>
                            <SelectItem value="voter">Voter</SelectItem>
                        </Select>
                        <FormMessage v-if="form.errors.type" variant="error">
                            {{ form.errors.type }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>NPM</Label>
                        <Input v-model="form.npm" autofocus />
                        <FormMessage v-if="form.errors.npm" variant="error">
                            {{ form.errors.npm }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Email</Label>
                        <Input v-model="form.email" type="email" />
                        <FormMessage v-if="form.errors.email" variant="error">
                            {{ form.errors.email }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Name</Label>
                        <Input v-model="form.name" />
                        <FormMessage v-if="form.errors.name" variant="error">
                            {{ form.errors.name }}
                        </FormMessage>
                    </div>
                    <div class="flex flex-row-reverse justify-between">
                        <Button type="submit">Add</Button>
                        <Link
                            :href="
                                route('admin.users.index', { _query: { type } })
                            "
                        >
                            <Button type="button" variant="outline">
                                Back
                            </Button>
                        </Link>
                    </div>
                </form>
            </CardContent>
        </Card>
    </div>
</template>
