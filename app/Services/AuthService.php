<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\Contracts\iAuthService;
use App\Models\User;
use App\Repositories\Contracts\iAuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthService implements iAuthService
{
    public function __construct(private iAuthRepository $authRepository) {}

    public function register(Request $request): User {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

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
