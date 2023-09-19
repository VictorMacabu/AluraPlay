<?php

namespace Alura\Mvc\Repository;

use Alura\Mvc\Entity\User;

class UserRepository
{
    public function __construct(private \PDO $pdo)
    {
    }

    public function create(User $user): bool
    {
        $sql = 'INSERT INTO users (email, password) VALUES (?, ?);';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$user->getEmail());
        $statement->bindValue(2, $user->getPassword());
        $result = $statement->execute();

        return $result;
    }


    public function find(string $email)
    {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();

        $userData = $statement->fetch(\PDO::FETCH_ASSOC);
        
        return $this->hydrateUser($userData);
    }

    private function hydrateUser(array $userData): User
    {
        $user = new User($userData['email'], $userData['password']);
        return $user;
    }
}