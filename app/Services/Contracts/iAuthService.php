<?php

namespace App\Services\Contracts;

use App\Models\User;
use Illuminate\Http\Request;

interface iAuthService
{
    public function register(Request $request): User;
    public function login(Request $request): void;
    public function logout(Request $request): void;
}
