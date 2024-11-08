<script lang="ts" setup>
import { Card, CardDescription, CardHeader, CardTitle } from "./ui/card";

defineProps<{
    organization: Organization;
}>();
</script>

<template>
    <Card class="cursor-pointer hover:outline">
        <CardHeader>
            <CardTitle>{{ organization.name }}</CardTitle>
            <CardDescription>{{ organization.code }}</CardDescription>
        </CardHeader>
    </Card>
</template>
