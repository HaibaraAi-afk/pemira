<script setup lang="ts">
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";

const model = defineModel<string>();
</script>

<template>
    <Select v-model="model">
        <SelectTrigger>
            <SelectValue placeholder="Select a type" />
        </SelectTrigger>
        <SelectContent>
            <SelectGroup>
                <SelectLabel>Types</SelectLabel>
                <SelectItem value="admin">Admin</SelectItem>
                <SelectItem value="committee">Committee</SelectItem>
            </SelectGroup>
        </SelectContent>
    </Select>
</template>
