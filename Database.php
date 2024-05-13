<?php
require "functions.php";
$config = require "config.php";
class Database
{
    public $connection;
    public $statement;
    public function __construct($config, $username, $password)
    {
        $dsn = "mysql:" . http_build_query($config, "", ";");

        $this->connection = new PDO($dsn, $username, $password);
    }
    public function query($query)
    {
        $this->statement  = $this->connection->prepare($query);
        $this->statement->execute();
    }
    public function fetchAllDataAssoc()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetchSingle()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
    public function uploadData()
    {
    }
}
