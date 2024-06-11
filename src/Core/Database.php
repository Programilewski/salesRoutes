<?php

namespace Core;

use PDO;

class Database
{
    public $connection;
    public $statement;
    public function __construct($config, $username = "izak", $password = "103@Ny4ff")
    {
        $dsn = "mysql:" . http_build_query($config, "", ";");
        $this->connection = new PDO($dsn, $username, $password);
    }
    public function query($query, $params = [])
    {
        $this->statement  = $this->connection->prepare($query);
        foreach ($params as $param) {
            $this->statement->bindParam($param["key"], $param["value"], $param["type"]);
        }
        $this->statement->execute();
        return $this;
    }
    public function fetchAllDataAssoc()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetch()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
}
