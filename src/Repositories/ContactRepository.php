<?php

namespace App\Repositories;

use PDO;

class ContactRepository extends BaseRepository
{
    protected $table = 'contact';

    public function create($data)
    {
        $statement = $this->pdo->prepare('
            INSERT INTO contact (name, email, adress, user_id)
            VALUES (:name, :email, :adress, :user_id)
        ');

        $statement->execute($data);
        $data['id'] = $this->pdo->lastInsertId();

        return (object)$data;
    }

    public function update($id, $data)
    {
        $id = (int)$id;

        $statement = $this->pdo->prepare('
            UPDATE contact SET
            name = :name,
            email = :email,
            adress = :adress
            WHERE id = '.$id
        );

        $statement->execute($data);
        $data['id'] = $id;

        return (object)$data;
    }

    public function getContactsOfUser($user)
    {
        $query = '
            SELECT
                contact.id,
                contact.name,
                contact.email
            FROM contact
            WHERE user_id = '.(int)$user->id;

        $contacts = $this->pdo->query($query)->fetchAll(PDO::FETCH_OBJ);

        return $contacts;
    }
}
