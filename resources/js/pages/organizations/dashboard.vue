<script lang="ts" setup>
import ConfirmationDialog from "@/components/ConfirmationDialog.vue";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { PageProps } from "@/types";
import { Link, router, useForm, usePage } from "@inertiajs/vue3";
import { ArrowLeft, ArrowRight, Building, LogOut, Vote } from "lucide-vue-next";

const props = defineProps<{
    organization: {
        ballots_count: number;
    } & Organization;
    ballots: Pagination<Ballot>;
}>();

const page = usePage<PageProps>();
const user = page.props.auth.user;

const prev = () => {
    if (props.ballots.prev_page_url) {
        router.visit(props.ballots.prev_page_url);
    }
};

const next = () => {
    if (props.ballots.next_page_url) {
        router.visit(props.ballots.next_page_url);
    }
};

const open = () => {
    const form = useForm({});
    form.post(route("organizations.open", props.organization.id));
};

const close = () => {
    const form = useForm({});
    form.post(route("organizations.close", props.organization.id));
};

const reset = () => {
    const form = useForm({});
    form.post(route("organizations.reset", props.organization.id));
};

const recap = () => {
    router.visit(
        route("organizations.recap.confirmation", {
            organization: props.organization.id,
        })
    );
};
</script>

<template>
    <div class="min-h-dvh flex items-center justify-center p-4">
        <Card class="max-w-screen-md w-full divide-y">
            <div class="flex justify-between gap-4">
                <CardHeader>
                    <CardTitle class="font-extrabold">PEMIRA</CardTitle>
                    <CardDescription>
                        Fakultas Ilmu Komputer 2025
                    </CardDescription>
                </CardHeader>
                <CardHeader class="flex-row gap-4">
                    <ConfirmationDialog
                        v-if="
                            !organization.is_open &&
                            organization.ballots_count > 0
                        "
                        title="Apakah kamu yakin?"
                        description="Pemilihan akan direset dan semua surat suara akan dihapus."
                        @accept="reset"
                    >
                        <Button variant="outline">Reset Pemilihan</Button>
                    </ConfirmationDialog>
                    <ConfirmationDialog
                        v-if="!organization.is_open"
                        title="Apakah kamu yakin?"
                        description="Pemilihan akan dimulai dan pemilih dapat mengirimkan surat suara mereka."
                        @accept="open"
                    >
                        <Button
                            :variant="
                                organization.ballots_count > 0
                                    ? 'outline'
                                    : 'default'
                            "
                        >
                            Buka Pemilihan
                        </Button>
                    </ConfirmationDialog>
                    <ConfirmationDialog
                        v-else
                        title="Apakah kamu yakin?"
                        description="Pemilih tidak akan bisa memilih lagi setelah pemilihan ditutup."
                        @accept="close"
                    >
                        <Button variant="destructive">Tutup Pemilihan</Button>
                    </ConfirmationDialog>
                    <Button
                        v-if="
                            !organization.is_open &&
                            organization.ballots_count > 0
                        "
                        @click="recap"
                    >
                        Mulai Validasi
                    </Button>
                </CardHeader>
            </div>
            <div class="grid grid-cols-2 divide-x">
                <CardHeader class="p-6">
                    <CardDescription class="flex items-center justify-between">
                        Organisasi
                        <Building class="size-4" />
                    </CardDescription>
                    <CardTitle class="text-xl">
                        {{ organization.name }}
                    </CardTitle>
                </CardHeader>
                <CardHeader class="p-6">
                    <CardDescription class="flex items-center justify-between">
                        Surat Suara
                        <Vote class="size-4" />
                    </CardDescription>
                    <CardTitle class="text-xl">
                        {{ organization.ballots_count }}
                    </CardTitle>
                </CardHeader>
            </div>
            <div class="w-full overflow-auto whitespace-nowrap">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[150px] pl-6">NPM</TableHead>
                            <TableHead>Username</TableHead>
                            <TableHead class="pr-6 text-right">
                                Waktu
                            </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-if="!ballots.data.length">
                            <TableCell class="text-center" colspan="4">
                                No data yet
                            </TableCell>
                        </TableRow>
                        <TableRow v-for="ballot in ballots.data">
                            <TableCell class="pl-6">
                                {{ ballot.user?.npm }}
                            </TableCell>
                            <TableCell>
                                {{ ballot.user?.name }}
                            </TableCell>
                            <TableCell class="pr-6 text-right">
                                {{ ballot.created_at }}
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
            <CardFooter
                class="px-6 py-2 flex items-center justify-between gap-4"
            >
                <Button
                    :disabled="!ballots.prev_page_url"
                    variant="outline"
                    class="w-full md:w-fit gap-1"
                    @click="prev"
                >
                    <ArrowLeft class="size-4" />
                    Sebelumnya
                </Button>
                <Button
                    :disabled="!ballots.next_page_url"
                    variant="outline"
                    class="w-full md:w-fit gap-1"
                    @click="next"
                >
                    Selanjutnya
                    <ArrowRight class="size-4" />
                </Button>
            </CardFooter>
            <CardFooter
                class="p-6 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0"
            >
                <CardDescription>
                    Butuh bantuan?
                    <a
                        href="https://wa.me/628819305047"
                        target="_blank"
                        class="text-blue-500 underline"
                    >
                        Hubungi kami disini
                    </a>
                </CardDescription>
                <Link
                    :href="
                        user.type === 'admin'
                            ? route('admin.dashboard')
                            : route('index')
                    "
                    class="w-full md:w-fit"
                >
                    <Button variant="outline" class="w-full gap-1">
                        <LogOut class="size-4" />
                        Kembali
                    </Button>
                </Link>
            </CardFooter>
        </Card>
    </div>
</template>
