<script setup lang="ts">
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";

import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbList,
    BreadcrumbPage,
} from "@/components/ui/breadcrumb";

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
import {
    Boxes,
    ChevronsUpDown,
    GalleryVerticalEnd,
    LayoutDashboard,
    LogOut,
    Plus,
    Users,
} from "lucide-vue-next";
import { ref } from "vue";

const menu = {
    user: {
        name: "User",
        email: "user@student.upnjatim.ac.id",
        avatar: "/avatars/shadcn.jpg",
    },
    orgs: [
        {
            name: "BEM Fasilkom",
            logo: GalleryVerticalEnd,
            plan: "BEM",
        },
        {
            name: "BLM Fasilkom",
            logo: GalleryVerticalEnd,
            plan: "BLM",
        },
        {
            name: "HIMASIFO",
            logo: GalleryVerticalEnd,
            plan: "20",
        },
        {
            name: "HIMASADA",
            logo: GalleryVerticalEnd,
            plan: "30",
        },
        {
            name: "HIMABISDI",
            logo: GalleryVerticalEnd,
            plan: "40",
        },
    ],
    items: [
        {
            name: "Dashboard",
            url: "#",
            icon: LayoutDashboard,
        },
        {
            name: "Groups",
            url: "#",
            icon: Boxes,
        },
        {
            name: "Candidates",
            url: "#",
            icon: Users,
        },
    ],
};

const currentOrganization = ref(menu.orgs[0]);

function setOrganization(org: (typeof menu.orgs)[number]) {
    currentOrganization.value = org;
}
</script>

<template>
    <SidebarProvider>
        <Sidebar collapsible="icon">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <DropdownMenu>
                            <DropdownMenuTrigger as-child>
                                <SidebarMenuButton
                                    size="lg"
                                    class="data-[state=open]:bg-accent data-[state=open]:text-accent-foreground border"
                                >
                                    <div
                                        class="flex aspect-square size-8 items-center justify-center rounded-lg bg-sidebar-primary text-sidebar-primary-foreground"
                                    >
                                        <component
                                            :is="currentOrganization.logo"
                                            class="size-4"
                                        />
                                    </div>
                                    <div
                                        class="grid flex-1 text-left text-sm leading-tight"
                                    >
                                        <span class="truncate font-semibold">{{
                                            currentOrganization.name
                                        }}</span>
                                        <span class="truncate text-xs">{{
                                            currentOrganization.plan
                                        }}</span>
                                    </div>
                                    <ChevronsUpDown class="ml-auto" />
                                </SidebarMenuButton>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent
                                class="w-[--radix-dropdown-menu-trigger-width] min-w-56 rounded-lg"
                                align="start"
                                side="bottom"
                                :side-offset="4"
                            >
                                <DropdownMenuLabel
                                    class="text-xs text-muted-foreground"
                                >
                                    Orgs
                                </DropdownMenuLabel>
                                <DropdownMenuItem
                                    v-for="(team, index) in menu.orgs"
                                    :key="team.name"
                                    class="gap-2 p-2"
                                    @click="setOrganization(team)"
                                >
                                    <div
                                        class="flex size-6 items-center justify-center rounded-sm border"
                                    >
                                        <component
                                            :is="team.logo"
                                            class="size-4 shrink-0"
                                        />
                                    </div>
                                    {{ team.name }}
                                </DropdownMenuItem>
                                <DropdownMenuSeparator />
                                <DropdownMenuItem class="gap-2 p-2">
                                    <div
                                        class="flex size-6 items-center justify-center rounded-md border bg-background"
                                    >
                                        <Plus class="size-4" />
                                    </div>
                                    <div
                                        class="font-medium text-muted-foreground"
                                    >
                                        Add team
                                    </div>
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>
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
                <div class="flex items-center gap-2 px-4">
                    <SidebarTrigger class="-ml-1" />
                    <Separator orientation="vertical" class="mr-2 h-4" />
                    <Breadcrumb>
                        <BreadcrumbList>
                            <BreadcrumbItem>
                                <BreadcrumbPage>Dashboard</BreadcrumbPage>
                            </BreadcrumbItem>
                        </BreadcrumbList>
                    </Breadcrumb>
                </div>
            </header>
            <div class="flex flex-1 p-4 pt-0">
                <slot />
            </div>
        </SidebarInset>
    </SidebarProvider>
</template>
