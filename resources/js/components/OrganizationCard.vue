<script lang="ts" setup>
import { Building } from "lucide-vue-next";
import { Card, CardDescription, CardHeader, CardTitle } from "./ui/card";

defineProps<{
    organization: Organization;
}>();
</script>

<template>
    <Card>
        <CardHeader>
            <div class="flex gap-4">
                <div class="flex-1">
                    <CardTitle>{{ organization.name }}</CardTitle>
                    <CardDescription>{{ organization.code }}</CardDescription>
                </div>
                <CardDescription class="flex items-center">
                    <Building />
                </CardDescription>
            </div>
        </CardHeader>
    </Card>
</template>
