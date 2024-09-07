import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS files
                'resources/css/Admin.css',
                'resources/css/Canvas.css',
                'resources/css/CanvasPro.css',
                'resources/css/Home.css',
                'resources/css/login.css',

                // JS Admin files
                'resources/js/Admin/Admin.js',
                'resources/js/Admin/Setting.js',

                // JS Canvas files
                'resources/js/Canvas/Canvas1.js',
                'resources/js/Canvas/Canvas2.js',
                'resources/js/Canvas/Canvas3.js',

                // JS login files
                'resources/js/login/script.js'

            ],
            refresh: true,
        }),
    ],
});
