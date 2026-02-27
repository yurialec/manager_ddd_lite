<?php

namespace App\Domains\Task\Actions;

use App\Domains\Task\Repositories\Contracts\TaskRepositoryInterface;

class GetTasksAction
{
    public function __construct(protected TaskRepositoryInterface $repository)
    {
    }

    public function execute(array $filters = [])
    {
        return $this->repository->all($filters);
    }
}