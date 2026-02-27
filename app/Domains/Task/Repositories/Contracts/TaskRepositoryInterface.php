<?php

namespace App\Domains\Task\Repositories\Contracts;

use App\Domains\Task\Models\Task;

interface TaskRepositoryInterface
{
    public function create(array $data): Task;
    public function all(array $filters = []): array;
}