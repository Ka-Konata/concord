<?php

namespace App\Services;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Services\Contracts\iAuthService;
use App\Models\User;
use App\Repositories\Contracts\iAuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthService implements iAuthService
{
    public function __construct(
        private iAuthRepository $authRepository
    ) {}

    public function register(Request $request): User {
        $user_data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        return $this->authRepository->create($user_data);
    }

    public function login(Request $request): void {

    }

    public function logout(Request $request): void {

    }
}
