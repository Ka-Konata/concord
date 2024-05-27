<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\iAuthRepository;

class AuthRepository implements iAuthRepository
{
    public function __construct(private User $model) {}

    public function create(Array $args): User {
        return $this->model->create($args);
    }

    public function save(): bool {
        return $this->model->save();
    }
}
