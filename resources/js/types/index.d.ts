export interface User {
    id: number;
    npm: string;
    email: string;
    name: string;
    org_code: string;
    type: "voter" | "committee" | "admin";
    avatar?: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: User;
    };
    flash?: string;
};
