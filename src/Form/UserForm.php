<?php

namespace Nicolas\ProjectManager\Form;

use Nicolas\ProjectManager\Kernel\FormBuilder;
use Nicolas\ProjectManager\Repository\UserAccountRepository;

class UserForm
{
    public static function createForm(string $method, $action = ""): string
    {
        return self::$method($action);
    }

    private static function login(string $action): string
    {
        $form_builder = new FormBuilder(method: "POST", action: $action);
        $form_builder->addEmailInput(identifier: "email", label: "Email", placeholder: "Entrez votre email", required: true)
            ->addPasswordInput(identifier: "password", label: "Mot de passe", required: true)
            ->addSubmit(label: "Envoyer", value: "login");

        return $form_builder->createForm();
    }

    private static function create(string $action): string
    {
        $form_builder = new FormBuilder(method: "POST", action: $action);
        $form_builder->addTextInput(identifier: "firstName", label: "Prénom", required: true)
            ->addTextInput(identifier: "lastName", label: "Nom", required: true)
            ->addEmailInput(identifier: "email", label: "Email", required: true)
            ->addPasswordInput(identifier: "password", label: "Mot de passe", required: true)
            ->addPasswordInput(identifier: "password_verify", label: "Vérification du mot de passe", required: true)
            ->addSubmit(label: "Envoyer", value: "createUser");

        return $form_builder->createForm();
    }

    private static function update(string $action): string
    {
        $user = $_SESSION['connected_user'];

        $form_builder = new FormBuilder(method: "POST", action: $action);
        $form_builder->addTextInput(identifier: "firstName", label: "Prénom", value: $user->getFirstName(), required: true)
            ->addTextInput(identifier: "lastName", label: "Nom", value: $user->getLastName(), required: true)
            ->addEmailInput(identifier: "email", label: "Email", value: $user->getEmail(), required: true)
            ->addPasswordInput(identifier: "password", label: "Mot de passe", required: true)
            ->addPasswordInput(identifier: "new_password", label: "Nouveau mot de passe")
            ->addPasswordInput(identifier: "new_password_verify", label: "Vérification du mot de passe")
            ->addSubmit(label: "Envoyer", value: "updateUser");

        return $form_builder->createForm();
    }
}
