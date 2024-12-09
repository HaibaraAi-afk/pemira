<script setup lang="ts">
import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
    AlertDialogTrigger,
} from "@/components/ui/alert-dialog";

const props = defineProps<{
    title: string;
    description: string;
}>();
</script>

<template>
    <AlertDialog>
        <AlertDialogTrigger as-child>
            <slot></slot>
        </AlertDialogTrigger>
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogTitle>{{ props.title }}</AlertDialogTitle>
                <AlertDialogDescription>
                    {{ props.description }}
                </AlertDialogDescription>
            </AlertDialogHeader>
            <AlertDialogFooter>
                <AlertDialogCancel @click="$emit('reject')">
                    Tidak
                </AlertDialogCancel>
                <AlertDialogAction @click="$emit('accept')">
                    Ya
                </AlertDialogAction>
            </AlertDialogFooter>
        </AlertDialogContent>
    </AlertDialog>
</template>
