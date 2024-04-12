import path from "path";
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/main.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources"),
            "~fontawesome": path.resolve(
                __dirname,
                "node_modules/@fortawesome/fontawesome-free"
            ),
        },
    },
});
