<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;
    private $errorMessage;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($data)
    {
        $data = only(['name', 'email', 'password'], $data);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        return $this->userRepository->create($data);
    }

    public function update($id, $data)
    {
        $data = only(['name', 'email'], $data);

        return $this->userRepository->update($id, $data);
    }

    public function isValidData($data)
    {
        if (strlen($data['name']) < 3 or strlen($data['name']) > 70) {
            $this->errorMessage = 'User name must be between 3 and 70 characters';
            return false;
        }

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) == false) {
            $this->errorMessage = 'User email must be a valid email';
            return false;
        }

        if (strlen($data['email']) < 3 or strlen($data['email']) > 70) {
            $this->errorMessage = 'User email must be between 3 and 70 characters';
            return false;
        }

        return true;
    }

    public function isValidDataForCreate($data)
    {
        if ($this->isValidData($data) == false) {
            return false;
        }

        if ($this->userRepository->emailExists($data['email'])) {
            $this->errorMessage = 'Email already registered';
            return false;
        }

        if (strlen($data['password']) < 6) {
            $this->errorMessage = 'Password must be at least 6 characters';
            return false;
        }

        return true;
    }

    public function isValidDataForEdit($data)
    {
        return $this->isValidData($data);
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}










//
