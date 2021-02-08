<?php


namespace App\servises;


class Connection
{
    private $dsn = 'mysql:host=localhost;dbname=blog';
    private $login = 'root';
    private $password = 'root';

    public  function makeConnection()
    {
        $pdo = new \PDO($this->dsn, $this->login,  $this->password);
        return $pdo;
    }




}