<script lang="ts" setup>
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Link, useForm } from "@inertiajs/vue3";
import { Plus, Settings } from "lucide-vue-next";
import { ref } from "vue";
import FormMessage from "./FormMessage.vue";
import { Avatar, AvatarFallback } from "./ui/avatar";
import { Button } from "./ui/button";
import { Input } from "./ui/input";
import { Label } from "./ui/label";

const props = defineProps<{
    organization: Organization;
}>();

const form = useForm({
    logo: <File | undefined>undefined,
    major: props.organization.major ?? "",
    name: props.organization.name,
});

const logoInput = ref<HTMLInputElement>();
const logoURL = ref<string | undefined>(props.organization.logo);

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

const remove = () => {
    if (!confirm("Are you sure you want to remove this organization?")) {
        return;
    }

    form.delete(
        route("admin.organizations.destroy", {
            organization: props.organization.id,
        })
    );
};
</script>

<template>
    <Card>
        <CardHeader class="flex-row justify-between gap-4">
            <div class="space-y-1.5">
                <CardTitle>Organization</CardTitle>
                <CardDescription>Settings</CardDescription>
            </div>
            <Settings class="size-4 text-muted-foreground" />
        </CardHeader>
        <CardContent>
            <form
                class="space-y-4"
                @submit.prevent="
                    form.put(
                        route('admin.organizations.update', {
                            organization: props.organization.id,
                        })
                    )
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
                        @error="logoURL = undefined"
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
                        <span class="text-muted-foreground"> - Optional </span>
                    </Label>
                    <Input v-model="form.major" />
                    <FormMessage v-if="form.errors.major" variant="error">
                        {{ form.errors.major }}
                    </FormMessage>
                </div>
                <div class="flex flex-row-reverse justify-between">
                    <Button type="submit">Save</Button>
                    <Link :href="route('admin.dashboard')">
                        <Button variant="outline">Back</Button>
                    </Link>
                </div>
            </form>
        </CardContent>
    </Card>
    <Button
        type="button"
        variant="destructive"
        class="mt-4 w-full"
        @click="remove"
    >
        Remove
    </Button>
</template>
