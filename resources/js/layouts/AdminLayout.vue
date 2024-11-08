<script setup lang="ts">
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";

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
    SidebarInset,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarProvider,
    SidebarRail,
    SidebarTrigger,
} from "@/components/ui/sidebar";
import {
    Building,
    Check,
    ChevronsUpDown,
    LayoutDashboard,
    LogOut,
    Users,
} from "lucide-vue-next";

const menu = {
    user: {
        name: "User",
        email: "user@student.upnjatim.ac.id",
        avatar: "/avatars/shadcn.jpg",
    },
    items: [
        {
            name: "Dashboard",
            url: route("admin.index"),
            icon: LayoutDashboard,
        },
        {
            name: "Organizations",
            url: route("organizations.index"),
            icon: Building,
        },
        {
            name: "Whitelists",
            url: route("whitelists.index"),
            icon: Check,
        },
        {
            name: "Users",
            url: route("users.index"),
            icon: Users,
        },
    ],
};
</script>

<template>
    <SidebarProvider>
        <Sidebar collapsible="icon">
            <SidebarContent>
                <SidebarGroup>
                    <SidebarGroupLabel>Menu</SidebarGroupLabel>
                    <SidebarMenu>
                        <SidebarMenuItem
                            v-for="item in menu.items"
                            :key="item.name"
                        >
                            <SidebarMenuButton as-child>
                                <a :href="item.url">
                                    <component :is="item.icon" />
                                    <span>{{ item.name }}</span>
                                </a>
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
                                    <Avatar class="h-8 w-8 rounded-lg">
                                        <AvatarImage
                                            :src="menu.user.avatar"
                                            :alt="menu.user.name"
                                        />
                                        <AvatarFallback class="rounded-lg">
                                            US
                                        </AvatarFallback>
                                    </Avatar>
                                    <div
                                        class="grid flex-1 text-left text-sm leading-tight"
                                    >
                                        <span class="truncate font-semibold">{{
                                            menu.user.name
                                        }}</span>
                                        <span class="truncate text-xs">{{
                                            menu.user.email
                                        }}</span>
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
                                        <Avatar class="h-8 w-8 rounded-lg">
                                            <AvatarImage
                                                :src="menu.user.avatar"
                                                :alt="menu.user.name"
                                            />
                                            <AvatarFallback class="rounded-lg">
                                                CN
                                            </AvatarFallback>
                                        </Avatar>
                                        <div
                                            class="grid flex-1 text-left text-sm leading-tight"
                                        >
                                            <span
                                                class="truncate font-semibold"
                                                >{{ menu.user.name }}</span
                                            >
                                            <span class="truncate text-xs">{{
                                                menu.user.email
                                            }}</span>
                                        </div>
                                    </div>
                                </DropdownMenuLabel>
                                <DropdownMenuSeparator />
                                <DropdownMenuItem>
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
