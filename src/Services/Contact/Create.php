<?php

namespace App\Services\Contact;

class Create extends AbstractContactService
{
    public function fire($userId, $data)
    {
        $data['user_id'] = $userId;
        list($phones, $data) = extractItem('phones', $data);

        $contact = $this->contactRepository->create($data);
        $this->phoneRepository->createRelation($contact, $phones);

        return $contact;
    }
}
