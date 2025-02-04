import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                axiatabold: ["AxiataBold", ...defaultTheme.fontFamily.sans],
                axiatabook: ["AxiataBook", ...defaultTheme.fontFamily.sans],
                axiatabookitalic: [
                    "AxiataBookItalic",
                    ...defaultTheme.fontFamily.sans,
                ],
                axiatamedium: ["AxiataMedium", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                mtxl1: "#109dd8",
                mtxl2: "#0b55b5",
                mtxl3: "#23d8f2",
            },
            backgroundImage: {
                "custom-pattern":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='36' height='72' viewBox='0 0 36 72'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23109dd8' fill-opacity='0.18'%3E%3Cpath d='M2 6h12L8 18 2 6zm18 36h12l-6 12-6-12z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\")",
            },
        },
    },
    plugins: [require("preline/plugin")],
};
