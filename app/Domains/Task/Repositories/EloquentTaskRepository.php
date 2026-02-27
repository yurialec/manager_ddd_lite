<?php

namespace App\Domains\Task\Repositories;

use App\Domains\Task\Models\Task;
use App\Domains\Task\Repositories\Contracts\TaskRepositoryInterface;

class EloquentTaskRepository implements TaskRepositoryInterface
{
    public function __construct(
        protected Task $model
    ) {
    }

    public function create(array $data): Task
    {
        return $this->model->create($data);
    }

    public function all(array $filters = []): array
    {
        return $this->model->latest()->get()->toArray();
    }
}