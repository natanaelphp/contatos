<?php

namespace App\Services\Contact;

class Update extends AbstractContactService
{
    public function fire($contactId, $data)
    {
        list($phones, $data) = extractItem('phones', $data);

        $contact = $this->contactRepository->update($contactId, $data);

        $this->phoneRepository->deletePhonesOfContact($contactId);
        $this->phoneRepository->createRelation($contact, $phones);

        return $contact;
    }

    public function getDataOfContact($contactId)
    {
        $contact = $this->contactRepository->get($contactId);
        $phones = $this->phoneRepository->getPhonesOfContact($contact->id);

        return [$contact, $phones];
    }
}
