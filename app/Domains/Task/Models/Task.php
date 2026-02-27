<?php

namespace App\Domains\Task\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * No DDD Lite, a model é apenas um mapeador de dados, sem regras de negócio
     */

    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
    ];
}
