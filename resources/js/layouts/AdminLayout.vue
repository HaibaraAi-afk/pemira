<script setup lang="ts">
import { Avatar, AvatarImage } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { Separator } from "@/components/ui/separator";
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarGroup,
    SidebarGroupLabel,
    SidebarHeader,
    SidebarInset,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarProvider,
    SidebarRail,
    SidebarTrigger,
} from "@/components/ui/sidebar";
import { PageProps } from "@/types";
import { Link, router, usePage } from "@inertiajs/vue3";
import {
    Building,
    Check,
    ChevronsUpDown,
    Flame,
    LayoutDashboard,
    LogOut,
    Plus,
    Users,
    Vote,
} from "lucide-vue-next";

const page = usePage<PageProps>();
const user = page.props.auth.user;

const menu = {
    items: [
        {
            name: "Dashboard",
            url: route("admin.dashboard"),
            icon: LayoutDashboard,
        },
        {
            name: "Whitelists",
            url: route("admin.whitelists.index"),
            icon: Check,
        },
        {
            name: "Users",
            url: route("admin.users.index"),
            icon: Users,
        },
    ],
};

const _organizations: Organization[] = [
    {
        code: "BEM",
        name: "BEM FASILKOM",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "BLM",
        name: "BLM FASILKOM",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "20",
        name: "HIMASIFO",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "30",
        name: "HIMASADA",
        logo: "test",
        is_public: true,
        is_open: false,
    },
    {
        code: "40",
        name: "HIMABISDI",
        logo: "test",
        is_public: true,
        is_open: false,
    },
];
</script>

<template>
    <SidebarProvider>
        <Sidebar collapsible="icon">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton
                            size="lg"
                            class="data-[state=open]:bg-accent data-[state=open]:text-accent-foreground border"
                        >
                            <div
                                class="flex aspect-square size-8 items-center justify-center rounded-lg bg-primary text-primary-foreground"
                            >
                                <Flame class="size-4" />
                            </div>
                            <div
                                class="grid flex-1 text-left text-sm leading-tight"
                            >
                                <span class="truncate font-extrabold">
                                    PEMIRA
                                </span>
                                <span class="truncate text-xs">
                                    Fakultas Ilmu Komputer
                                </span>
                            </div>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>
            <SidebarContent>
                <SidebarGroup>
                    <SidebarGroupLabel>Menu</SidebarGroupLabel>
                    <SidebarMenu>
                        <SidebarMenuItem v-for="item in menu.items">
                            <SidebarMenuButton as-child>
                                <Link :href="item.url">
                                    <component :is="item.icon" />
                                    <span>{{ item.name }}</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroup>
                <SidebarGroup>
                    <SidebarGroupLabel class="flex justify-between">
                        Organizations
                        <Button size="icon" variant="ghost">
                            <Plus class="size-4 text-muted-foreground" />
                        </Button>
                    </SidebarGroupLabel>
                    <SidebarMenu>
                        <SidebarMenuItem v-for="organization in _organizations">
                            <SidebarMenuButton as-child>
                                <Link
                                    :href="route('admin.organizations.index')"
                                >
                                    <Building class="size-4" />
                                    {{ organization.name }}
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    </SidebarMenu>
                </SidebarGroup>
            </SidebarContent>
            <SidebarFooter>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <DropdownMenu>
                            <DropdownMenuTrigger as-child>
                                <SidebarMenuButton
                                    size="lg"
                                    class="data-[state=open]:bg-accent data-[state=open]:text-accent-foreground"
                                >
                                    <Avatar>
                                        <AvatarImage
                                            v-if="user.avatar"
                                            :src="user.avatar"
                                            :alt="user.name"
                                        />
                                    </Avatar>
                                    <div
                                        class="grid flex-1 text-left text-sm leading-tight"
                                    >
                                        <span class="truncate font-semibold">
                                            {{ user.name }}
                                        </span>
                                        <span class="truncate text-xs">
                                            {{ user.email }}
                                        </span>
                                    </div>
                                    <ChevronsUpDown class="ml-auto size-4" />
                                </SidebarMenuButton>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent
                                class="w-[--radix-dropdown-menu-trigger-width] min-w-56 rounded-lg"
                                side="bottom"
                                align="end"
                                :side-offset="4"
                            >
                                <DropdownMenuLabel class="p-0 font-normal">
                                    <div
                                        class="flex items-center gap-2 px-1 py-1.5 text-left text-sm"
                                    >
                                        <Avatar>
                                            <AvatarImage
                                                v-if="user.avatar"
                                                :src="user.avatar"
                                                :alt="user.name"
                                            />
                                        </Avatar>
                                        <div
                                            class="grid flex-1 text-left text-sm leading-tight"
                                        >
                                            <span
                                                class="truncate font-semibold"
                                            >
                                                {{ user.name }}
                                            </span>
                                            <span class="truncate text-xs">
                                                {{ user.email }}
                                            </span>
                                        </div>
                                    </div>
                                </DropdownMenuLabel>
                                <DropdownMenuSeparator />
                                <DropdownMenuItem
                                    class="cursor-pointer"
                                    @click="router.visit(route('index'))"
                                >
                                    <Vote />
                                    Back to Vote
                                </DropdownMenuItem>
                                <DropdownMenuItem
                                    class="cursor-pointer"
                                    @click="router.visit(route('logout'))"
                                >
                                    <LogOut />
                                    Log out
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarFooter>
            <SidebarRail />
        </Sidebar>
        <SidebarInset>
            <header
                class="flex h-16 shrink-0 items-center gap-2 transition-[width,height] ease-linear group-has-[[data-collapsible=icon]]/sidebar-wrapper:h-12"
            >
                <div id="header" class="flex items-center gap-2 px-4">
                    <SidebarTrigger class="-ml-1" />
                    <Separator orientation="vertical" class="mr-2 h-4" />
                </div>
            </header>
            <div class="flex flex-1 p-4 pt-0">
                <slot />
            </div>
        </SidebarInset>
    </SidebarProvider>
</template>
