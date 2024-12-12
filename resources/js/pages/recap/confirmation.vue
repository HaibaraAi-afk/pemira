<script lang="ts" setup>
import { Button } from "@/components/ui/button";
import {
    Card,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Link } from "@inertiajs/vue3";

const props = defineProps<{
    organization: Organization;
}>();
</script>

<template>
    <div class="min-h-dvh flex items-center justify-center p-4">
        <Card class="max-w-md w-full">
            <CardHeader>
                <CardTitle>Validasi Surat Suara</CardTitle>
                <CardDescription>
                    Bukti surat suara pemilih akan tampil di layar dan dapat
                    dikategorikan sah atau tidak sah.
                </CardDescription>
            </CardHeader>
            <CardFooter class="gap-2">
                <Link
                    :href="
                        route('organizations.dashboard', {
                            organization: props.organization.id,
                        })
                    "
                >
                    <Button variant="outline">Kembali</Button>
                </Link>
                <Link
                    :href="
                        route('organizations.recap.validate', {
                            organization: props.organization.id,
                        })
                    "
                >
                    <Button>Mulai</Button>
                </Link>
                <Link
                    :href="
                        route('organizations.recap.reset', {
                            organization: props.organization.id,
                        })
                    "
                >
                    <Button variant="destructive">Mulai Ulang</Button>
                </Link>
            </CardFooter>
        </Card>
    </div>
</template>
