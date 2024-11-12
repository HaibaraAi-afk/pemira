<script lang="ts" setup>
withDefaults(
    defineProps<{
        variant?: "default" | "error" | "success";
    }>(),
    {
        variant: "default",
    }
);
</script>

<template>
    <div
        :class="{
            'text-muted-foreground': variant === 'default',
            'text-destructive': variant === 'error',
            'text-green-600': variant === 'success',
        }"
        class="text-sm"
    >
        <slot />
    </div>
</template>
