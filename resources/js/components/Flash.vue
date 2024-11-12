<script setup lang="ts">
import { Alert, AlertDescription } from "@/components/ui/alert";
import { PageProps } from "@/types";
import { usePage } from "@inertiajs/vue3";
import { AlertCircle } from "lucide-vue-next";

const {
    props: { flash },
} = usePage<PageProps>();
</script>

<template>
    <Alert v-if="flash" :variant="flash.type">
        <AlertCircle class="h-4 w-4" />
        <AlertDescription>
            {{ flash.message }}
        </AlertDescription>
    </Alert>
</template>
