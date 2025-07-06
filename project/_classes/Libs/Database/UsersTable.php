<?php

namespace Libs\Database;

use PDOException;

class UsersTable
{
    private $db;

    public function __construct(MySQL $mysql)
    {
        $this->db = $mysql->connect();
    }

    public function find($email, $password)
    {
        try {
            $statement = $this->db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
            $statement->execute(['email' => $email, 'password' => $password]);

            return $statement->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function insert($data)
    {
        try {
            $statement = $this->db->prepare(
                "INSERT INTO users (name, email, phone, address,
                password, created_at) VALUES (:name, :email, :phone,
                :address, :password, NOW())"
            );

            $statement->execute($data);

            return $this->db->lastInsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
