<script lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { Plus } from "lucide-vue-next";
import { ref } from "vue";

export default {
    layout: AdminLayout,
};
</script>

<script lang="ts" setup>
import FormMessage from "@/components/FormMessage.vue";
import { Avatar, AvatarFallback } from "@/components/ui/avatar";
import {
    Breadcrumb,
    BreadcrumbItem,
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

const form = useForm({
    logo: <File | undefined>undefined,
    major: "",
    name: "",
});

const logoInput = ref<HTMLInputElement>();
const logoURL = ref<string>();

const setLogo = (event: Event) => {
    const target = event.target as HTMLInputElement;
    form.logo = target.files?.[0];

    if (form.logo) {
        const reader = new FileReader();
        reader.onload = (e) => {
            logoURL.value = e.target?.result as string;
        };
        reader.readAsDataURL(form.logo);
    }
};
</script>

<template>
    <Teleport defer to="#header">
        <Breadcrumb>
            <BreadcrumbList>
                <BreadcrumbItem class="hidden md:block">
                    Organizations
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
                <CardTitle>Add New Organization</CardTitle>
                <CardDescription>Please complete the form</CardDescription>
            </CardHeader>
            <CardContent>
                <form
                    class="space-y-4"
                    @submit.prevent="
                        form.post(route('admin.organizations.store'))
                    "
                >
                    <div class="space-y-2 text-center">
                        <Label class="block">Logo</Label>
                        <input
                            ref="logoInput"
                            type="file"
                            class="absolute -top-24 -left-24"
                            accept="image/webp"
                            @change="setLogo"
                        />
                        <img
                            v-if="logoURL"
                            :src="logoURL"
                            alt="Logo"
                            class="mx-auto size-24 hover:opacity-75 cursor-pointer"
                            @click="$refs.logoInput.click()"
                        />
                        <Avatar
                            v-else
                            class="size-24 border-2 cursor-pointer hover:outline"
                            @click="$refs.logoInput.click()"
                        >
                            <AvatarFallback>
                                <Plus class="size-4 text-muted-foreground" />
                            </AvatarFallback>
                        </Avatar>
                        <FormMessage v-if="form.errors.logo" variant="error">
                            {{ form.errors.logo }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Name</Label>
                        <Input v-model="form.name" autofocus />
                        <FormMessage v-if="form.errors.name" variant="error">
                            {{ form.errors.name }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>
                            Major
                            <span class="text-muted-foreground">
                                - Optional
                            </span>
                        </Label>
                        <Input v-model="form.major" />
                        <FormMessage v-if="form.errors.major" variant="error">
                            {{ form.errors.major }}
                        </FormMessage>
                    </div>
                    <div class="flex flex-row-reverse justify-between">
                        <Button type="submit">Add</Button>
                        <Link :href="route('admin.dashboard')">
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
