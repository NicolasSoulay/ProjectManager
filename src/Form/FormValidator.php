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

    public static function validateUserUpdate(): string
    {
        $message = '';
        $message .= Validate::validateName($_POST['firstName'], 'Le prénom est incorrect<br>', 'le champs "Prénom" est vide<br>');
        $message .= Validate::validateName($_POST['lastName'], 'Le nom de famille est incorrect<br>', 'le champs "Nom de famille" est vide<br>');
        $message .= Validate::validateEmail($_POST['email'], "L'email est incorrect<br>", 'le champs "Email" est vide<br>');
        if (!password_verify($_POST['password'], $_SESSION['connected_user']->getPassword())) {
            $message .= "le mot de passe est incorrect";
        }
        if ($_POST['new_password'] !== '' || $_POST['new_password_verify'] !== '') {
            $message .= Validate::validatePassword($_POST['new_password'], $_POST['new_password_verify']);
        }
        if (Security::isUsed('UserAccount', 'email', $_POST['email']) && $_SESSION['connected_user']->getEmail() !== $_POST['email']) {
            $message .= "L'adresse email est déja utilisé<br>";
        }
        return $message;
    }

    public static function validateProjectCreation(): string
    {
        $message = '';
        $message .= Validate::validateName($_POST['name'], 'Le nom de projet est incorrect<br>', 'le champs "Nom de projet" est vide<br>');

        return $message;
    }
}
