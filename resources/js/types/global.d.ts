import { PageProps as InertiaPageProps } from "@inertiajs/core";
import { AxiosInstance } from "axios";
import { route as ziggyRoute } from "ziggy-js";
import { PageProps as AppPageProps, User } from "./";

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
        id: number;
        major: string | null;
        name: string;
        logo: string;
        is_open: boolean;
    }

    interface Group {
        id: number;
        organization_id: string;
        year: string | null;
        major: string | null;
        name: string;
        min_candidates: number;
        ordering: number;

        candidates?: Candidate[];
        candidates_count?: number;
    }

    interface Candidate {
        id: number;
        organization_id: number;
        group_id: number;
        name_1: string;
        name_2: string;
        vision: string;
        mission: string;
        picture: string;

        votes?: number;
    }

    interface Whitelist {
        npm: string;
    }

    interface Ballot {
        id: number;
        organization_id: number;
        user_id: number;
        ktm: string;
        verification: string;
        is_verified: boolean | null;
        verified_at: string | null;
        created_at: string;

        user?: User;
    }

    interface UserVerification {
        id: number;
        user_id: number;
        ktm: string | null;
        verification: string | null;
    }

    interface BallotDetail {
        id: number;
        organization_id: number;
        group_id: number;
        ballot_id: number;
        candidate_id: number;

        group?: Group;
        candidate?: Candidate;
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
