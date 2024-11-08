<script lang="ts">
import FormMessage from "@/components/FormMessage.vue";
import { Button } from "@/components/ui/button";
import AdminLayout from "@/layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";

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
import {
    Card,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Textarea } from "@/components/ui/textarea";

const form = useForm({
    whitelists: "",
});
</script>

<template>
    <Teleport defer to="#header">
        <Breadcrumb>
            <BreadcrumbList>
                <BreadcrumbItem>
                    <BreadcrumbPage>Whitelists</BreadcrumbPage>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
    </Teleport>
    <div class="flex-1">
        <Card class="max-w-sm">
            <CardHeader>
                <CardTitle>Whitelists</CardTitle>
                <CardDescription>List of active students id</CardDescription>
                <form
                    class="space-y-6 mt-2"
                    @submit.prevent="form.post(route('whitelists.store'))"
                >
                    <div class="space-y-2">
                        <Textarea v-model="form.whitelists" />
                        <FormMessage
                            v-if="form.errors.whitelists"
                            variant="error"
                        >
                            {{ form.errors.whitelists }}
                        </FormMessage>
                    </div>
                    <Button type="submit">Save</Button>
                </form>
            </CardHeader>
        </Card>
    </div>
</template>
