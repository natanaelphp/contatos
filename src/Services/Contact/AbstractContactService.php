<?php

namespace App\Services\Contact;

use App\Repositories\ContactRepository;
use App\Repositories\PhoneRepository;

abstract class AbstractContactService
{
    protected $contactRepository;
    protected $phoneRepository;
    protected $errorMessage;

    public function __construct(ContactRepository $contactRepository, PhoneRepository $phoneRepository)
    {
        $this->contactRepository = $contactRepository;
        $this->phoneRepository = $phoneRepository;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
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

        if (strlen($data['adress']) < 3 or strlen($data['adress']) > 70) {
            $this->errorMessage = 'Adress must be between 3 and 70 characters';
            return false;
        }

        if (strlen(implode($data['phones'])) == 0) {
            $this->errorMessage = 'Contact must have at least one phone';
            return false;
        }

        return true;
    }
}
