import { usePage } from "@inertiajs/vue3";

export const permission = (permission) => {
    if (permission && permission instanceof Array && permission.length > 0) {
        const permissions =
            usePage().props.role && usePage().props.role.permissions;
        const requiredPermissions = permission;

        return permissions.some((permission) => {
            let srcPermision =
                permission !== undefined ? permission : permission;
            return requiredPermissions.includes(srcPermision);
        });
    } else {
        return false;
    }
};

export const role = (role) => {
    if (role && role instanceof Array && role.length > 0) {
        const currentRoleKey = usePage().props.role && usePage().props.role.key;

        return role.includes(currentRoleKey);
    } else {
        return false;
    }
};
