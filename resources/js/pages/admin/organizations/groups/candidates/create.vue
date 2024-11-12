<script lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
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
import { PageProps } from "@/types";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { Plus } from "lucide-vue-next";
import { ref } from "vue";

const page = usePage<PageProps>();
const organization = page.props.organization;
const group = page.props.group;

const form = useForm({
    picture: <File | undefined>undefined,
    name_1: "",
    name_2: "",
    vision: "",
    mission: "",
});

const pictureInput = ref<HTMLInputElement>();
const pictureURL = ref<string>();

const setLogo = (event: Event) => {
    const target = event.target as HTMLInputElement;
    form.picture = target.files?.[0];

    if (form.picture) {
        const reader = new FileReader();
        reader.onload = (e) => {
            pictureURL.value = e.target?.result as string;
        };
        reader.readAsDataURL(form.picture);
    }
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
                    <BreadcrumbLink
                        :href="
                            route('admin.organizations.groups.show', {
                                organization: organization?.id,
                                group: group?.id,
                            })
                        "
                    >
                        {{ group?.name }}
                    </BreadcrumbLink>
                </BreadcrumbItem>
                <BreadcrumbSeparator />
                <BreadcrumbItem>
                    <BreadcrumbPage>Add New Candidate</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </Teleport>
    <div class="flex-1">
        <Card class="max-w-sm">
            <CardHeader>
                <CardTitle>Add New Candidate</CardTitle>
                <CardDescription>Please complete the form</CardDescription>
            </CardHeader>
            <CardContent>
                <form
                    class="space-y-4"
                    @submit.prevent="
                        form.post(
                            route(
                                'admin.organizations.groups.candidates.store',
                                {
                                    organization: organization?.id,
                                    group: group?.id,
                                }
                            )
                        )
                    "
                >
                    <div class="space-y-2 text-center">
                        <Label class="block">Foto</Label>
                        <input
                            ref="pictureInput"
                            type="file"
                            class="absolute -top-24 -left-24"
                            accept="image/webp"
                            @change="setLogo"
                        />
                        <img
                            v-if="pictureURL"
                            :src="pictureURL"
                            alt="Logo"
                            class="mx-auto size-32 rounded-xl hover:opacity-75 cursor-pointer"
                            @click="$refs.pictureInput.click()"
                        />
                        <Avatar
                            v-else
                            class="size-32 rounded-xl border-2 cursor-pointer hover:outline"
                            @click="$refs.pictureInput.click()"
                        >
                            <AvatarFallback>
                                <Plus class="size-4 text-muted-foreground" />
                            </AvatarFallback>
                        </Avatar>
                        <FormMessage v-if="form.errors.picture" variant="error">
                            {{ form.errors.picture }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Name 1</Label>
                        <Input v-model="form.name_1" autofocus />
                        <FormMessage v-if="form.errors.name_1" variant="error">
                            {{ form.errors.name_1 }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Name 2</Label>
                        <Input v-model="form.name_2" />
                        <FormMessage v-if="form.errors.name_2" variant="error">
                            {{ form.errors.name_2 }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Vision</Label>
                        <Input v-model="form.vision" />
                        <FormMessage v-if="form.errors.vision" variant="error">
                            {{ form.errors.vision }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Mission</Label>
                        <Input v-model="form.mission" />
                        <FormMessage v-if="form.errors.mission" variant="error">
                            {{ form.errors.mission }}
                        </FormMessage>
                    </div>
                    <div class="flex flex-row-reverse justify-between">
                        <Button type="submit">Add</Button>
                        <Link
                            :href="
                                route('admin.organizations.groups.show', {
                                    organization: organization?.id,
                                    group: group?.id,
                                })
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
