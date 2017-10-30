<?php

namespace App\Services;

use PDO;

class DatabaseConnection
{
    public function getConnection()
    {
        $dsn = 'mysql:dbname=cohros;host=127.0.0.1';
        $user = 'root';
        $password = 'root';

        return new PDO($dsn, $user, $password);
    }
}
