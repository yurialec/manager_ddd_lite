<!-- resources/js/Pages/Dashboard.vue -->
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-4">Bem-vindo ao DDD Lite</h2>
                <p class="mb-4">Selecione uma opção no menu para começar.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="/tasks" class="p-4 border rounded hover:bg-gray-50">
                        <h3 class="font-bold">Tarefas</h3>
                        <p class="text-sm text-gray-600">Gerenciar tarefas do projeto</p>
                    </a>
                </div>
            </div>
        </div>

    </AppLayout>
</template>