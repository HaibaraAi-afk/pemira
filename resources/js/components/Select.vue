<script setup lang="ts">
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { watch } from "vue";

defineProps<{
    placeholder?: string;
    items?: { key: string; value: string }[];
}>();

const emit = defineEmits<{
    (e: "change", value: string): void;
}>();

const model = defineModel<string>();
watch(model, (value) => value && emit("change", value));
</script>

<template>
    <Select v-model="model">
        <SelectTrigger>
            <SelectValue :placeholder="placeholder" />
        </SelectTrigger>
        <SelectContent>
            <SelectGroup>
                <SelectItem v-for="{ key, value } in items" :value="key">
                    {{ value }}
                </SelectItem>
                <slot />
            </SelectGroup>
        </SelectContent>
    </Select>
</template>
