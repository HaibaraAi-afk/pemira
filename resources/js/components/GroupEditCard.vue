<script lang="ts" setup>
import { PageProps } from "@/types";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { Settings } from "lucide-vue-next";
import FormMessage from "./FormMessage.vue";
import { Button } from "./ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "./ui/card";
import { Input } from "./ui/input";
import { Label } from "./ui/label";

const props = defineProps<{
    group: Group;
}>();
const page = usePage<PageProps>();
const organization = page.props.organization;
const form = useForm({
    name: props.group.name,
    year: props.group.year ?? "",
    major: props.group.major ?? "",
    min_candidates: props.group.min_candidates,
    ordering: props.group.ordering,
});

const remove = () => {
    if (!confirm("Are you sure you want to remove this group?")) {
        return;
    }

    form.delete(
        route("admin.organizations.groups.destroy", {
            organization: organization?.id,
            group: props.group.id,
        })
    );
};
</script>

<template>
    <Card>
        <CardHeader class="flex-row justify-between gap-4">
            <div class="space-y-1.5">
                <CardTitle>Group</CardTitle>
                <CardDescription>Settings</CardDescription>
            </div>
            <Settings class="size-4 text-muted-foreground" />
        </CardHeader>
        <CardContent>
            <form
                class="space-y-4"
                @submit.prevent="
                    form.put(
                        route('admin.organizations.groups.update', {
                            organization: organization?.id,
                            group: group.id,
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
                    <FormMessage v-if="form.errors.ordering" variant="error">
                        {{ form.errors.ordering }}
                    </FormMessage>
                </div>
                <div class="flex flex-row-reverse justify-between">
                    <Button type="submit">Save</Button>
                    <Link
                        :href="
                            route('admin.organizations.show', {
                                organization: organization?.id,
                            })
                        "
                    >
                        <Button variant="outline" type="button">Back</Button>
                    </Link>
                </div>
            </form>
        </CardContent>
    </Card>
    <Button variant="destructive" class="w-full mt-4" @click="remove">
        Remove
    </Button>
</template>
