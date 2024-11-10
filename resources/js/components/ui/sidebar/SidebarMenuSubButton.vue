<script setup lang="ts">
import { cn } from "@/lib/utils";
import type { PrimitiveProps } from "radix-vue";
import { Primitive } from "radix-vue";
import type { HTMLAttributes } from "vue";

const props = withDefaults(
    defineProps<
        PrimitiveProps & {
            size?: "sm" | "md";
            isActive?: boolean;
            class?: HTMLAttributes["class"];
        }
    >(),
    {
        as: "a",
        size: "md",
    }
);
</script>

<template>
    <Primitive
        data-sidebar="menu-sub-button"
        :as="as"
        :as-child="asChild"
        :data-size="size"
        :data-active="isActive"
        :class="
            cn(
                'flex h-7 min-w-0 -translate-x-px items-center gap-2 overflow-hidden rounded-md px-2 text-foreground outline-none ring-ring hover:bg-accent hover:text-accent-foreground focus-visible:ring-2 active:bg-accent active:text-accent-foreground disabled:pointer-events-none disabled:opacity-50 aria-disabled:pointer-events-none aria-disabled:opacity-50 [&>span:last-child]:truncate [&>svg]:size-4 [&>svg]:shrink-0 [&>svg]:text-accent-foreground',
                'data-[active=true]:bg-accent data-[active=true]:text-accent-foreground',
                size === 'sm' && 'text-xs',
                size === 'md' && 'text-sm',
                'group-data-[collapsible=icon]:hidden',
                props.class
            )
        "
    >
        <slot />
    </Primitive>
</template>
