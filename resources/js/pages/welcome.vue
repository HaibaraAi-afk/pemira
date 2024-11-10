<script lang="ts" setup>
import { PageProps } from "@/types";
import { usePage } from "@inertiajs/vue3";

const page = usePage<PageProps>();
</script>

<template>
    <h1>Selamat datang {{ page.props.auth.user.name }} - PEMIRA 2025!</h1>
</template>
