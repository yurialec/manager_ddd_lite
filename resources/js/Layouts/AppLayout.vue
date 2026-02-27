<!-- resources/js/Layouts/AppLayout.vue -->
<script setup>
import { Link } from '@inertiajs/vue3';

// Props opcionais para personalizar o título ou subtítulo de cada página
defineProps({
    title: {
        type: String,
        default: 'Dashboard'
    }
});
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <!-- Header / Navbar -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900">
                    <Link href="/">Minha App DDD</Link>
                </h1>
                <nav class="space-x-4">
                    <Link href="/" class="text-gray-600 hover:text-gray-900">Dashboard</Link>
                    <Link href="/tasks" class="text-gray-600 hover:text-gray-900">Tarefas</Link>
                </nav>
            </div>
        </header>

        <!-- Conteúdo da Página -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Slot padrão: onde o conteúdo da página será injetado -->
                <slot />
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t mt-auto">
            <div class="max-w-7xl mx-auto py-4 px-4 text-center text-gray-500 text-sm">
                &copy; {{ new Date().getFullYear() }} Estudo DDD Lite
            </div>
        </footer>
    </div>
</template>