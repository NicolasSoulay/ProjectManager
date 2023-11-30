<?php

namespace Nicolas\ProjectManager\Form;

use Nicolas\ProjectManager\Kernel\Security;
use Nicolas\ProjectManager\Kernel\Validate;

class FormValidator
{

    public static function validateUserCreation(): string
    {
        $message = '';
        $message .= Validate::validateName($_POST['firstName'], 'Le prénom est incorrect<br>', 'le champs "Prénom" est vide<br>');
        $message .= Validate::validateName($_POST['lastName'], 'Le nom de famille est incorrect<br>', 'le champs "Nom de famille" est vide<br>');
        $message .= Validate::validateEmail($_POST['email'], "L'email est incorrect<br>", 'le champs "Email" est vide<br>');
        $message .= Validate::validatePassword($_POST['password'], $_POST['password_verify']);
        if (Security::isUsed('UserAccount', 'email', $_POST['email'])) {
            $message .= "L'adresse email est déja utilisé<br>";
        }
        return $message;
    }
}
