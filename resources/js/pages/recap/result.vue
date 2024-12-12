<script lang="ts" setup>
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { DonutChart } from "@/components/ui/chart-donut";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { Link } from "@inertiajs/vue3";

const props = defineProps<{
    organization: Organization;
    groups: Group[];
    ballots: number;
    ballots_verified: number;
}>();

const ballotsChart = [
    {
        title: "Surat Suara Sah",
        value: props.ballots_verified,
    },
    {
        title: "Surat Suara Tidak Sah",
        value: props.ballots - props.ballots_verified,
    },
];
</script>

<template>
    <div class="p-4 space-y-4">
        <Card class="max-w-screen-xl mx-auto">
            <CardHeader class="text-center">
                <CardTitle>Hasil Validasi</CardTitle>
            </CardHeader>
            <CardContent>
                <Tabs default-value="ballots">
                    <TabsList class="block w-fit mx-auto">
                        <TabsTrigger value="ballots">Surat Suara</TabsTrigger>
                        <TabsTrigger
                            v-for="group in groups"
                            :value="`grp${group.id}`"
                        >
                            {{ group.name }}
                        </TabsTrigger>
                        <TabsTrigger value="overview">Ringkasan</TabsTrigger>
                    </TabsList>
                    <TabsContent value="ballots">
                        <div class="max-w-lg mx-auto grid grid-cols-2 gap-2">
                            <Card>
                                <CardHeader>
                                    <CardTitle>Surat Suara</CardTitle>
                                    <CardTitle class="text-4xl">
                                        {{ ballots }}
                                    </CardTitle>
                                </CardHeader>
                            </Card>
                            <Card>
                                <CardHeader>
                                    <CardTitle>Surat Suara Sah</CardTitle>
                                    <CardTitle class="text-4xl">
                                        {{ ballots_verified }}
                                    </CardTitle>
                                </CardHeader>
                            </Card>
                            <Card class="col-span-2">
                                <CardHeader>
                                    <CardTitle>Ratio Surat Suara</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <DonutChart
                                        :data="ballotsChart"
                                        index="title"
                                        :category="'value'"
                                        :colors="['#10B981', '#EF4444']"
                                    />
                                </CardContent>
                            </Card>
                        </div>
                    </TabsContent>
                    <TabsContent
                        v-for="group in groups"
                        :value="`grp${group.id}`"
                    >
                        <div class="grid grid-cols-4 gap-4">
                            <Card
                                v-for="candidate in group.candidates"
                                class="relative"
                            >
                                <div
                                    class="absolute top-4 right-4 size-12 bg-white border rounded-full text-lg font-bold shadow text-black flex items-center justify-center"
                                >
                                    {{ candidate.votes }}
                                </div>
                                <img
                                    :src="`/storage/${candidate.picture}`"
                                    class="w-full aspect-square"
                                />
                                <CardHeader class="text-center">
                                    <CardTitle>
                                        {{ candidate.name_1 }}
                                    </CardTitle>
                                    <template v-if="candidate.name_2">
                                        &
                                        <CardTitle>
                                            {{ candidate.name_2 }}
                                        </CardTitle>
                                    </template>
                                </CardHeader>
                            </Card>
                        </div>
                    </TabsContent>
                    <TabsContent value="overview">
                        <div class="grid grid-cols-4 gap-4">
                            <Card v-for="group in groups">
                                <CardHeader class="p-4 border-b">
                                    <CardTitle>{{ group.name }}</CardTitle>
                                </CardHeader>
                                <div class="divide-y">
                                    <div
                                        v-for="candidate in group.candidates"
                                        class="px-4 py-2 flex gap-4"
                                    >
                                        <div class="grow">
                                            <CardDescription>
                                                {{ candidate.name_1 }}
                                                <template
                                                    v-if="candidate.name_2"
                                                >
                                                    &
                                                    {{ candidate.name_2 }}
                                                </template>
                                            </CardDescription>
                                        </div>
                                        <div>
                                            <CardDescription>
                                                {{ candidate.votes }}
                                            </CardDescription>
                                        </div>
                                    </div>
                                </div>
                            </Card>
                        </div>
                    </TabsContent>
                </Tabs>
            </CardContent>
            <CardFooter class="justify-center">
                <Link
                    :href="
                        route('organizations.dashboard', {
                            organization: props.organization.id,
                        })
                    "
                >
                    <Button>Selesai</Button>
                </Link>
            </CardFooter>
        </Card>
    </div>
</template>
