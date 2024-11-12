export interface User {
    id: number;
    npm: string;
    email: string;
    year: string;
    major: string;
    name: string;
    type: "voter" | "committee" | "admin";
    avatar?: string;
    gen?: number;
}

interface Flash {
    message: string;
    type: "default" | "destructive";
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: User;
    };
    flash?: Flash;
    organizations?: Organization[] | null;
};
