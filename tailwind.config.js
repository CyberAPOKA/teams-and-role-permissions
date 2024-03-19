import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                sans: [
                    "Poppins",
                    "Helvetica",
                    "sans-serif",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
            colors: {
                "ag-blue": "#3699FF",
                "ag-blue-100": "#007BFF",
                "ag-blue-200": "#187DE4",
                "ag-indigo": "#6610F2",
                "ag-purple": "#6F42C1",
                "ag-pink": "#E83E8C",
                "ag-red": "#DC3545",
                "ag-orange": "#FD7E14",
                "ag-yellow": "#FFC107",
                "ag-green": "#28A745",
                "ag-teal": "#20C997",
                "ag-cyan": "#17A2B8",
                "ag-white": "#FFFFFF",
                "ag-gray": "#7E8299",
                "ag-gray-dark": "#3F4254",
                "ag-primary": "#3699FF",
                "ag-secondary": "#E4E6EF",
                "ag-success": "#1BC5BD",
                "ag-info": "#8950FC",
                "ag-warning": "#FFA800",
                "ag-danger": "#F64E60",
                "ag-light": "#F3F6F9",
                "ag-dark": "#181C32",
                "ag-muted": "#B5B5C3",
            },
        },
    },

    plugins: [forms, typography],
};
