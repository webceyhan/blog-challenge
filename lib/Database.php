<?php

namespace Lib;

class Database
{
    private \PDO $pdo;

    public function __construct(array $config = [])
    {
        // extract config variables
        [
            'host' => $host,
            'name' => $name,
            'username' => $username,
            'password' => $password,
        ] = $config;

        // build dsl string
        $dsl = "mysql:host={$host};dbname={$name}";

        // connect to the database
        $this->pdo = new \PDO($dsl, $username, $password);
    }

    public function query(string $sql, array $params = []): \PDOStatement
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);

        return $statement;
    }

    public function lastInsertId(): string
    {
        return $this->pdo->lastInsertId();
    }
}
