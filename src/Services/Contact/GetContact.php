<?php

namespace App\Services\Contact;

use PDO;

class GetContact extends AbstractContactService
{
    public function fire($contactId)
    {
        $contact =  $this->contactRepository->get($contactId);
        $contact->phones = $this->phoneRepository->getPhonesOfContact($contactId);

        return $contact;
    }
}
