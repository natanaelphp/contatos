<?php

namespace App\Repositories;

use PDO;

class PhoneRepository extends BaseRepository
{
    private $table = 'phone';

    public function create($data)
    {
        $statement = $this->pdo->prepare('
            INSERT INTO phone (contact_id, number)
            VALUES (:contact_id, :number)
        ');

        return $statement->execute($data);;
    }

    public function getPhonesOfContact($contactId)
    {
        $query = 'SELECT * FROM phone WHERE contact_id = '.(int)$contactId;
        $phones = $this->pdo->query($query)->fetchAll(PDO::FETCH_OBJ);

        return $phones;
    }

    public function deletePhonesOfContact($contactId)
    {
        $query = 'DELETE FROM '.$this->table.' where contact_id = '.(int)$contactId;
        $statement = $this->pdo->prepare($query);

        return $statement->execute();
    }

    public function createRelation($contact, $phones)
    {
        foreach ($phones as $phone) {
            if ($phone != null) {
                $data = [
                    'contact_id' => $contact->id,
                    'number' => $phone
                ];

                $this->create($data);
            }
        }
    }
}
