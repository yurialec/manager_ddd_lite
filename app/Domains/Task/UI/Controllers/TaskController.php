<?php

namespace App\Domains\Task\UI\Controllers;

use App\Domains\Task\Actions\CreateTaskAction;
use App\Domains\Task\Actions\GetTasksAction;
use App\Domains\Task\DTOs\CreateTaskDTO;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController
{
    public function index(GetTasksAction $action)
    {
        $tasks = $action->execute();
        return Inertia::render('Task/Index', ['tasks' => $tasks]);
    }

    public function store(Request $request, CreateTaskAction $action)
    {
        //Validar os campos vindos do formulário
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        //enviar os dados validados para serem mapeados pelo dto
        $dto = new CreateTaskDTO($validated['title'], $validated['description']);

        //executa a action de criação
        $task = $action->execute($dto);

        return redirect()->back()->with('success', 'Tarefa Criada!');
    }
}