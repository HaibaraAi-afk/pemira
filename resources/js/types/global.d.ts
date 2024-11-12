import { PageProps as InertiaPageProps } from "@inertiajs/core";
import { AxiosInstance } from "axios";
import { route as ziggyRoute } from "ziggy-js";
import { PageProps as AppPageProps } from "./";

declare global {
    interface Window {
        axios: AxiosInstance;
    }

    /* eslint-disable no-var */
    var route: typeof ziggyRoute;

    interface Pagination<T> {
        data: T[];
        next_cursor: null;
        next_page_url: string | null;
        path: string;
        per_page: number;
        prev_cursor: null;
        prev_page_url: string | null;
    }

    interface Organization {
        code: string;
        name: string;
        logo: string;
        is_public: boolean;
        is_open: boolean;
    }

    interface Whitelist {
        npm: string;
    }
}

declare module "vue" {
    interface ComponentCustomProperties {
        route: typeof ziggyRoute;
    }
}

declare module "@inertiajs/core" {
    interface PageProps extends InertiaPageProps, AppPageProps {}
}
