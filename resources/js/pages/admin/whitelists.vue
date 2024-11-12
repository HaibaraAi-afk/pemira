<script lang="ts">
import AdminLayout from "@/layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";

export default {
    layout: AdminLayout,
};
</script>

<script lang="ts" setup>
import FormMessage from "@/components/FormMessage.vue";
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbList,
    BreadcrumbPage,
} from "@/components/ui/breadcrumb";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";

const props = defineProps<{
    whitelist?: Whitelist;
}>();

const validateForm = useForm({
    npm: props.whitelist ? props.whitelist.npm : "",
});
const storeForm = useForm({
    npm: "",
});
const massForm = useForm({
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
        <div class="grid grid-cols-3 gap-4">
            <div>
                <Card>
                    <CardHeader>
                        <CardTitle>Validate</CardTitle>
                        <CardDescription>
                            Search npm to validate
                        </CardDescription>
                        <form
                            class="space-y-6 mt-2"
                            @submit.prevent="
                                validateForm.post(
                                    route('whitelists.validate'),
                                    {
                                        data: {
                                            npm: validateForm.npm,
                                        },
                                    }
                                )
                            "
                        >
                            <div class="space-y-2">
                                <Input
                                    v-model="validateForm.npm"
                                    placeholder="Insert NPM"
                                />
                                <FormMessage
                                    v-if="validateForm.wasSuccessful"
                                    variant="success"
                                >
                                    NPM is in whitelists
                                </FormMessage>
                                <FormMessage
                                    v-if="validateForm.errors.npm"
                                    variant="error"
                                >
                                    NPM is not in whitelists
                                </FormMessage>
                            </div>
                            <Button type="submit">Validate</Button>
                        </form>
                    </CardHeader>
                </Card>
            </div>
            <div>
                <Card>
                    <CardHeader>
                        <CardTitle>Single Whitelist</CardTitle>
                        <CardDescription>
                            Add NPM to whitelist
                        </CardDescription>
                        <form
                            class="space-y-6 mt-2"
                            @submit.prevent="
                                storeForm.post(route('whitelists.store.single'))
                            "
                        >
                            <div class="space-y-2">
                                <Input
                                    v-model="storeForm.npm"
                                    placeholder="Insert NPM"
                                />
                                <FormMessage
                                    v-if="storeForm.wasSuccessful"
                                    variant="success"
                                >
                                    Added to whitelists
                                </FormMessage>
                                <FormMessage
                                    v-if="storeForm.errors.npm"
                                    variant="error"
                                >
                                    {{ storeForm.errors.npm }}
                                </FormMessage>
                            </div>
                            <Button type="submit">Add</Button>
                        </form>
                    </CardHeader>
                </Card>
            </div>
            <div>
                <Card>
                    <CardHeader>
                        <CardTitle>Mass Whitelists</CardTitle>
                        <CardDescription>
                            Update all NPMs in whitelist
                        </CardDescription>
                        <form
                            class="space-y-6 mt-2"
                            @submit.prevent="
                                massForm.post(route('whitelists.store'))
                            "
                        >
                            <div class="space-y-2">
                                <Textarea
                                    v-model="massForm.whitelists"
                                    placeholder="Copy and paste NPMs separated with new line here"
                                />
                                <FormMessage
                                    v-if="massForm.errors.whitelists"
                                    variant="error"
                                >
                                    {{ massForm.errors.whitelists }}
                                </FormMessage>
                            </div>
                            <Button type="submit">Save</Button>
                        </form>
                    </CardHeader>
                </Card>
            </div>
        </div>
    </div>
</template>
