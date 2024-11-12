<script lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
import { PageProps } from "@/types";
import { Link, useForm, usePage } from "@inertiajs/vue3";

export default {
    layout: AdminLayout,
};
</script>

<script lang="ts" setup>
import FormMessage from "@/components/FormMessage.vue";
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

const props = defineProps<{
    new_ordering: number;
}>();
const page = usePage<PageProps>();
const organization = page.props.organization;

const form = useForm({
    name: "",
    year: "",
    major: "",
    min_candidates: 1,
    ordering: props.new_ordering,
});
</script>

<template>
    <Teleport defer to="#header">
        <Breadcrumb>
            <BreadcrumbList>
                <BreadcrumbItem>
                    <BreadcrumbLink
                        :href="
                            route('admin.organizations.show', organization?.id)
                        "
                    >
                        {{ organization?.name }}
                    </BreadcrumbLink>
                </BreadcrumbItem>
                <BreadcrumbSeparator class="hidden md:block" />
                <BreadcrumbItem>
                    <BreadcrumbPage>Add New Group</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </Teleport>
    <div class="flex-1">
        <Card class="max-w-sm">
            <CardHeader>
                <CardTitle>Add New Group</CardTitle>
                <CardDescription>Please complete the form</CardDescription>
            </CardHeader>
            <CardContent>
                <form
                    class="space-y-4"
                    @submit.prevent="
                        form.post(
                            route('admin.organizations.groups.store', {
                                organization: organization?.id,
                            })
                        )
                    "
                >
                    <div class="space-y-2">
                        <Label>Name</Label>
                        <Input v-model="form.name" autofocus />
                        <FormMessage v-if="form.errors.name" variant="error">
                            {{ form.errors.name }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Year</Label>
                        <Input v-model="form.year" />
                        <FormMessage v-if="form.errors.year" variant="error">
                            {{ form.errors.year }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Major</Label>
                        <Input v-model="form.major" />
                        <FormMessage v-if="form.errors.major" variant="error">
                            {{ form.errors.major }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Min. Candidates</Label>
                        <Input v-model="form.min_candidates" type="number" />
                        <FormMessage>
                            The minimum amount of candidates need to be selected
                            when voting.
                        </FormMessage>
                        <FormMessage
                            v-if="form.errors.min_candidates"
                            variant="error"
                        >
                            {{ form.errors.min_candidates }}
                        </FormMessage>
                    </div>
                    <div class="space-y-2">
                        <Label>Ordering</Label>
                        <Input v-model="form.ordering" />
                        <FormMessage
                            v-if="form.errors.ordering"
                            variant="error"
                        >
                            {{ form.errors.ordering }}
                        </FormMessage>
                    </div>
                    <div class="flex flex-row-reverse justify-between">
                        <Button type="submit">Add</Button>
                        <Link
                            :href="
                                route('admin.organizations.show', {
                                    organization: organization?.id,
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
