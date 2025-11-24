import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/tab.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~font' : path.resolve(__dirname,'resources/fonts')
        }
    },
    input: [
        'resources/scss/app.scss'
    ],
});
