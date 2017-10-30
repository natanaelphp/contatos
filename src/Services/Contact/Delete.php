<?php

namespace App\Services\Contact;

class Delete extends AbstractContactService
{
    public function fire($contactId)
    {
        $this->phoneRepository->deletePhonesOfContact($contactId);
        $contact = $this->contactRepository->delete($contactId);
    }
}
