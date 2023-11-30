<?php

namespace Nicolas\ProjectManager\Controller;

use Nicolas\ProjectManager\Form\FormValidator;
use Nicolas\ProjectManager\Form\UserForm;
use Nicolas\ProjectManager\Kernel\AbstractController;
use Nicolas\ProjectManager\Kernel\Security;
use Nicolas\ProjectManager\Kernel\View;
use Nicolas\ProjectManager\Repository\UserAccountRepository;

class UserController extends AbstractController
{
    private UserAccountRepository $userAccountRepository;

    public function __construct()
    {
        $this->userAccountRepository = new UserAccountRepository;
    }

    public function createUser(): void
    {
        $message = '';

        if (isset($_POST['submit']) && $_POST['submit'] === 'createUser') {
            $message = FormValidator::validateUserCreation();

            if ($message === '') {
                $this->userAccountRepository->create([
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                ]);
                $message = "L'utilisateur a bien été crée";
            }
        }

        if (!Security::isConnected() && $message === "L'utilisateur a bien été crée") {
            $view = new View('login', 'Connection', [
                'message' => $message,
                'form' => UserForm::createForm("login"),
                'nav_off' => true,
            ]);
        } else {
            $view = new View('form', 'Créer un compte', [
                'form' => UserForm::createForm('create'),
                'message' => $message,
                'nav_off' => true,
            ]);
        }

        $view->addCss(['bootstrap.min']);
        $view->addJs(['bootstrap.min']);
        $view->render();
    }

    public function disconnect(): void
    {
        Security::disconnect();
        $this->redirectIndex();
    }
}
