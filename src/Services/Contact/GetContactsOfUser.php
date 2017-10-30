<?php
/*------------------------------------------------------------------------------
    This service is not being used
------------------------------------------------------------------------------*/

namespace App\Services\Contact;

use PDO;

class GetContactsOfUser
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fire($user)
    {
        $contacts = $this->getFromDatabase($user);
        $contacts = $this->group($contacts);

        return $contacts;
    }

    private function getFromDatabase($user)
    {
        $query = '
            SELECT
                contact.id,
                contact.name,
                contact.email,
                contact.adress,
                phone.number
            FROM contact
            LEFT JOIN phone ON phone.contact_id = contact.id
            WHERE user_id = '.(int)$user->id;

        $contacts = $this->pdo->query($query)->fetchAll(PDO::FETCH_OBJ);

        return $contacts;
    }

    private function group($contacts)
    {
        $lastContactId = null;
        $newList = [];

        foreach ($contacts as $contact) {
            $contact->phones = [];

            if ($contact->id != $lastContactId) {
                if ($contact->number != null) {
                    $contact->phones[] = $contact->number;
                }
                unset($contact->number);
                $newList[$contact->id] = $contact;
            } else {
                if ($contact->number != null) {
                    $newList[$contact->id]->phones[] = $contact->number;
                }
            }
            $lastContactId = $contact->id;
        }

        return $newList;
    }
}
