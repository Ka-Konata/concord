<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface iAuthRepository
{
    public function create(Array $args): User;
    public function save(): bool;
}
