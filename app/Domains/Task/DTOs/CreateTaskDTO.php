<?php

namespace App\Domains\Task\DTOs;

class CreateTaskDTO
{

    /**
     * recebe os dados do formulário e padroniza ao invez de enviar somente `request->all()` para o banco
     * o readonly serve para que os dados não mudem nunca
     * @param string $title
     * @param mixed $description
     */
    public function __construct(
        public readonly string $title,
        public readonly ?string $description = null,
    ) {
    }

    /**
     * transforma o dto em um array simples para a model
     * @return array{description: mixed, is_completed: bool, title: string}
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'is_completed' => false,
        ];
    }
}