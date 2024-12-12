<script lang="ts" setup>
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Skeleton } from "@/components/ui/skeleton";
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
                            v-for="candidate in candidates"
                            :class="{
                                outline: selected == candidate.id,
                            }"
                            class="cursor-pointer overflow-hidden"
                            @click="selected = candidate.id"
                        >
                            <div class="grid grid-cols-2 divide-x">
                                <div>
                                    <Skeleton class="w-full aspect-square" />
                                    <CardHeader class="text-sm">
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
                                <div>
                                    <CardHeader>
                                        <CardDescription
                                            class="text-foreground"
                                        >
                                            Visi
                                        </CardDescription>
                                        <CardDescription>
                                            {{ candidate.vision }}
                                        </CardDescription>
                                    </CardHeader>
                                    <CardContent>
                                        <CardDescription
                                            class="text-foreground"
                                        >
                                            Misi
                                        </CardDescription>
                                        <CardDescription>
                                            {{ candidate.mission }}
                                        </CardDescription>
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
