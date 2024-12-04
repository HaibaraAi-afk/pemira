<script lang="ts" setup>
import { Icon } from "@iconify/vue/dist/iconify.js";
import { Button } from "./ui/button";
import { CardContent, CardDescription, CardTitle } from "./ui/card";
</script>

<template>
    <CardContent class="p-6 border-b text-center space-y-4">
        <div>
            <CardTitle class="text-2xl font-extrabold">
                TAPI TUNGGU!
            </CardTitle>
            <CardDescription>
                Pamer ke sosmed dulu gasi kalo udah siap vote?!
            </CardDescription>
        </div>
        <div class="flex items-center justify-center gap-4">
            <Icon
                icon="tabler:arrow-wave-right-down"
                class="size-16 text-orange-500 -rotate-[24deg]"
            />
            <Button size="lg" class="text-lg font-extrabold">
                🔥SHARE🔥
            </Button>
            <Icon
                icon="tabler:arrow-wave-left-up"
                class="size-16 text-orange-500 -rotate-[24deg]"
            />
        </div>
    </CardContent>
</template>
