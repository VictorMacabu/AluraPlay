<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\User;
use Alura\Mvc\Repository\UserRepository;

class LoginController implements Controller
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        
        $userData = $this->repository->find($email);
        
        $correctPassword = password_verify($password, $userData->password ?? '');
        
        if ($correctPassword) {
            header('Location: /');
        } else {
            header('Location: /login?sucesso=0');
        }

    }
}