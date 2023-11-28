<?php

namespace Nicolas\ProjectManager\Form;

use Nicolas\ProjectManager\Kernel\FormBuilder;

class UserForm
{
    public static function createForm(string $method, $action = ""): string
    {
        return self::$method($action);
    }

    private static function login(string $action): string
    {
        $form_builder = new FormBuilder(method: "POST", action: $action);
        $form_builder->addEmailInput(identifier: "email", label: "Email", placeholder: "Entrez votre email")
            ->addPasswordInput(identifier: "password", label: "Mot de passe")
            ->addSubmit(label: "Envoyer", value: "login");

        return $form_builder->createForm();
    }

    private static function create(string $action): string
    {
        $form_builder = new FormBuilder(method: "POST", action: $action);
        $form_builder->addTextInput(identifier: "firstName", label: "Prénom")
            ->addTextInput(identifier: "lastName", label: "Nom")
            ->addEmailInput(identifier: "email", label: "Email")
            ->addPasswordInput(identifier: "password", label: "Mot de passe")
            ->addPasswordInput(identifier: "password_verify", label: "vérification du mot de passe")
            ->addSubmit(label: "Envoyer", value: "createUser");

        return $form_builder->createForm();
    }
}
