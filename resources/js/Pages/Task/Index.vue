<template>
    <AppLayout title="Gerenciar Tarefas">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-4">Tarefas</h2>
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block font-medium mb-1">Título</label>
                        <input v-model="form.title"
                            class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500 outline-none" />
                        <div v-if="form.errors.title" class="text-red-500 text-sm mt-1">
                            {{ form.errors.title }}
                        </div>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Descrição</label>
                        <textarea v-model="form.description"
                            class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                    </div>
                    <button type="submit" :disabled="form.processing"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 disabled:opacity-50">
                        {{ form.processing ? 'Salvando...' : 'Criar Tarefa' }}
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Tarefas Existentes</h2>

            <div v-if="tasks.length === 0" class="text-gray-500">
                Nenhuma tarefa cadastrada.
            </div>

            <ul class="divide-y">
                <li v-for="task in tasks" :key="task.id" class="py-3 flex justify-between items-center">
                    <div>
                        <h3 class="font-medium" :class="{ 'line-through text-gray-400': task.is_completed }">
                            {{ task.title }}
                        </h3>
                        <p v-if="task.description" class="text-sm text-gray-600">
                            {{ task.description }}
                        </p>
                    </div>
                    <span class="px-2 py-1 text-xs rounded"
                        :class="task.is_completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'">
                        {{ task.is_completed ? 'Concluída' : 'Pendente' }}
                    </span>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, router } from '@inertiajs/vue3';

defineProps({
    tasks: {
        type: Array,
        default: () => []
    }
});

const form = useForm({
    title: '',
    description: '',
});

const submit = () => {
    form.post('/tasks', {
        preserveScroll: true, // Mantém a posição do scroll
        onSuccess: () => {
            form.reset();
            // Recarrega apenas a prop 'tasks' enviada pelo controller
            router.reload({
                only: ['tasks'],
                preserveState: true
            });
        }
    });
};
</script>