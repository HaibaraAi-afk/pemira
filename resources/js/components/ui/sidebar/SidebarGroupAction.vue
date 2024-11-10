<script setup lang="ts">
import { cn } from "@/lib/utils";
import type { PrimitiveProps } from "radix-vue";
import { Primitive } from "radix-vue";
import type { HTMLAttributes } from "vue";

const props = defineProps<
    PrimitiveProps & {
        class?: HTMLAttributes["class"];
    }
>();
</script>

<template>
    <Primitive
        data-sidebar="group-action"
        :as="as"
        :as-child="asChild"
        :class="
            cn(
                'absolute right-3 top-3.5 flex aspect-square w-5 items-center justify-center rounded-md p-0 text-foreground outline-none ring-ring transition-transform hover:bg-accent hover:text-accent-foreground focus-visible:ring-2 [&>svg]:size-4 [&>svg]:shrink-0',
                // Increases the hit area of the button on mobile.
                'after:absolute after:-inset-2 after:md:hidden',
                'group-data-[collapsible=icon]:hidden',
                props.class
            )
        "
    >
        <slot />
    </Primitive>
</template>
