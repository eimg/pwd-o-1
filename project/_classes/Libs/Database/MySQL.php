<?php

namespace Libs\Database;

use PDO;
use PDOException;

class MySQL
{
    private $db;

    public function __construct(
        private $dbhost = "localhost", 
        private $dbuser = "root", 
        private $dbpass = "", 
        private $dbname = "project",
    )
    {
        // 
    }

    public function connect()
    {
        try {
            $this->db = new PDO(
                "mysql:dbhost=$this->dbhost;dbname=$this->dbname",
                $this->dbuser,
                $this->dbpass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]
            );

            return $this->db;

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
