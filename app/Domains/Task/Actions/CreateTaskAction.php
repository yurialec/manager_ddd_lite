<?php

namespace App\Domains\Task\Actions;

use App\Domains\Task\DTOs\CreateTaskDTO;
use App\Domains\Task\Models\Task;
use App\Domains\Task\Repositories\Contracts\TaskRepositoryInterface;

// Nota: A Action depende da Interface do Repositório, não da implementação concreta. Isso permite trocar o banco de dados facilmente nos testes.
// Nota: Use uma Action sempre que houver regra de negócio, validação de domínio, efeito colateral (enviar email, integrar com API externa).

class CreateTaskAction
{
    public function __construct(protected TaskRepositoryInterface $repository)
    {
    }

    public function execute(CreateTaskDTO $dto): Task
    {
        // Aqui você aplica regras de negócio complexas antes de salvar
        return $this->repository->create($dto->toArray());
    }
}
