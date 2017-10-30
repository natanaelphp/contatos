<?php

namespace App\Repositories;

class UserRepository extends BaseRepository
{
    protected $table = 'user';

    public function create($data)
    {
        $statement = $this->pdo->prepare('
            INSERT INTO user (name, email, password)
            VALUES (:name, :email, :password)
        ');

        return $statement->execute($data);
    }

    public function update($id, $data)
    {
        $statement = $this->pdo->prepare('
            UPDATE user SET
            name = :name,
            email = :email
            where id = '.(int)$id
        );

        return $statement->execute($data);
    }

    public function emailExists($email)
    {
        $query = "SELECT * FROM user WHERE email = '$email'";
        $count = $this->pdo->query($query)->rowCount();

        return $count > 0;
    }
}
