<?php

namespace Nicolas\ProjectManager\Controller;

use Nicolas\ProjectManager\Form\UserForm;
use Nicolas\ProjectManager\Kernel\AbstractController;
use Nicolas\ProjectManager\Kernel\Security;
use Nicolas\ProjectManager\Kernel\Validate;
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
            $message .= Validate::validateName($_POST['firstName'], 'Le prénom est incorrect<br>', 'le champs "Prénom" est vide<br>');
            $message .= Validate::validateName($_POST['lastName'], 'Le nom de famille est incorrect<br>', 'le champs "Nom de famille" est vide<br>');
            $message .= Validate::validateEmail($_POST['email'], "L'email est incorrect<br>", 'le champs "Email" est vide<br>');
            $message .= Validate::validatePassword($_POST['password'], $_POST['password_verify']);
            if (Security::isUsed('UserAccount', 'email', $_POST['email'])) {
                $message .= "L'adresse email est déja utilisé<br>";
            }
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
        $view = new View('form', 'Créer un compte', [
            'form' => UserForm::createForm('create'),
            'message' => $message,
        ]);
        $view->addCss(['bootstrap.min']);
        $view->addJs(['bootstrap.min']);
        $view->render();
    }
    public function disconnectUser(): void
    {
        Security::disconnect();
        $this->redirectIndex();
    }
}
