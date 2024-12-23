<script lang="ts" setup>
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps<{
    organization: Organization;
    group: Group;
    candidates: Candidate[];
    ballotDetail: BallotDetail | null;
}>();

const selected = ref(props.ballotDetail?.candidate_id);

const submit = () => {
    if (!selected.value) {
        return;
    }
    useForm({
        candidate_id: selected.value,
    }).post(
        route("vote.group.store", {
            organization: props.organization.id,
            group: props.group.id,
        }),
        {
            preserveState: false,
        }
    );
};
</script>

<template>
    <div class="min-h-dvh flex justify-center p-4">
        <div class="max-w-screen-xl w-full space-y-4">
            <Card>
                <CardHeader class="text-center">
                    <CardTitle>{{ group.name }}</CardTitle>
                    <CardDescription>
                        Pilihlah salah satu kandidat di bawah ini!
                    </CardDescription>
                    <div class="flex justify-center gap-2">
                        <Link
                            :href="
                                route('vote.group.previous', {
                                    organization: organization.id,
                                    group: group.id,
                                })
                            "
                        >
                            <Button variant="outline">Kembali</Button>
                        </Link>
                        <Button :disabled="!selected" @click="submit">
                            Selanjutnya
                        </Button>
                    </div>
                </CardHeader>
                <CardContent>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <Card
                            v-for="(candidate, number) in candidates"
                            :class="{
                                outline: selected == candidate.id,
                            }"
                            class="aspect-square cursor-pointer overflow-hidden"
                            @click="selected = candidate.id"
                        >
                            <div class="size-full grid grid-cols-2 divide-x">
                                <div>
                                    <div class="relative">
                                        <div
                                            class="absolute bottom-4 left-4 size-8 flex items-center justify-center shadow bg-white border rounded-full text-lg font-bold"
                                        >
                                            {{ number + 1 }}
                                        </div>
                                        <img
                                            :src="`/storage/${candidate.picture}`"
                                        />
                                    </div>
                                    <CardHeader class="p-4 text-sm">
                                        <CardTitle class="leading-normal">
                                            {{ candidate.name_1 }}
                                            <template v-if="candidate.name_2">
                                                <br />
                                                &
                                                <br />
                                                {{ candidate.name_2 }}
                                            </template>
                                        </CardTitle>
                                    </CardHeader>
                                </div>
                                <div class="overflow-y-auto">
                                    <CardHeader class="p-4">
                                        <CardDescription
                                            class="text-foreground text-xs"
                                        >
                                            Visi
                                        </CardDescription>
                                        <pre
                                            class="font-sans text-xs text-muted-foreground text-wrap"
                                            >{{ candidate.vision }}</pre
                                        >
                                    </CardHeader>
                                    <CardContent class="px-4 pb-4">
                                        <CardDescription
                                            class="text-foreground text-xs"
                                        >
                                            Misi
                                        </CardDescription>
                                        <pre
                                            class="font-sans text-xs text-muted-foreground text-wrap"
                                            >{{ candidate.mission }}</pre
                                        >
                                    </CardContent>
                                </div>
                            </div>
                        </Card>
                    </div>
                </CardContent>
            </Card>
        </div>
    </div>
</template>
