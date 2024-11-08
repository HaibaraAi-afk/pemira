<script lang="ts" setup>
withDefaults(
    defineProps<{
        variant?: "default" | "error";
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
        }"
        class="text-sm"
    >
        <slot />
    </div>
</template>
