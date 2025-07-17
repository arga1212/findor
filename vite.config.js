import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'; // Import 'path' module untuk membantu resolusi path

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build', // Pastikan ini sesuai dengan path error Anda
        manifest: true, // Pastikan ini true agar manifest.json dibuat
    },
    resolve: {
        alias: {
            // Menambahkan alias '@' yang menunjuk ke direktori 'resources/js'
            // Ini memungkinkan Anda mengimpor modul seperti '@components/Example.vue'
            // alih-alih '../../resources/js/components/Example.vue'
            '@': path.resolve(__dirname, 'resources/js'),
            // Anda juga bisa menambahkan alias untuk CSS jika diperlukan
            // '@css': path.resolve(__dirname, 'resources/css'),
        },
    },
});
