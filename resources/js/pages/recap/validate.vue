<script lang="ts" setup>
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { User } from "@/types";
import { useForm } from "@inertiajs/vue3";

const props = defineProps<{
    organization: Organization;
    ballot: Ballot;
    user: User;
    verification: UserVerification;
}>();

const submit = (verified = true) => {
    useForm({
        ballot_id: props.ballot.id,
        verified: verified ? 1 : 0,
    }).post(
        route("organizations.recap.validate.store", {
            organization: props.organization.id,
        })
    );
};
</script>

<template>
    <div class="p-4 space-y-4">
        <Card>
            <CardHeader class="text-center">
                <CardTitle>Validasi Surat Suara</CardTitle>
                <CardDescription>
                    {{ user.npm }}
                    -
                    {{ user.name }}
                </CardDescription>
            </CardHeader>
            <CardContent class="flex justify-center gap-4">
                <Button variant="destructive" @click="submit(false)"
                    >Tidak Sah</Button
                >
                <Button variant="success" @click="submit()">Sah</Button>
            </CardContent>
        </Card>
        <div class="grid grid-cols-2 gap-4">
            <img
                :src="'/storage/' + verification.ktm!"
                class="w-full rounded-lg"
            />
            <img
                :src="'/storage/' + verification.verification!"
                class="w-full rounded-lg"
            />
        </div>
    </div>
</template>
