<?php

namespace App\Repositories;

use PDO;

class BaseRepository
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $query = 'SELECT * FROM '.$this->table;
        $entities = $this->pdo->query($query)->fetchAll(PDO::FETCH_OBJ);

        return $entities;
    }

    public function get($id)
    {
        $query = 'SELECT * FROM '.$this->table.' where id = '.(int)$id;
        $entity = $this->pdo->query($query)->fetch(PDO::FETCH_OBJ);

        return $entity;
    }

    public function delete($id)
    {
        $query = 'DELETE FROM '.$this->table.' where id = '.(int)$id;
        $statement = $this->pdo->prepare($query);

        return $statement->execute();
    }
}
