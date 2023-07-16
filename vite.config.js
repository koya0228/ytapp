import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/layout.css',
                'resources/css/form.css',
                'resources/css/player.css',

                'resources/js/app.js',
                'resources/js/form.js',
                'resources/js/player.js'
            ],
            refresh: true,
        }),
    ],
    define: {
        global: 'window',
    }
});
