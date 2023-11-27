<?php

namespace Nicolas\ProjectManager\Kernel;

abstract class Validate
{
    public static function validateName(string $name, string $message, string $empty_message): string
    {
        $pattern = "/^[\p{L}\p{M} '-]*$/mu";
        if ($name === '') {
            return  $empty_message;
        }
        if (!preg_match($pattern, $name)) {
            return  $message;
        }

        return '';
    }

    public static function validateEmail(string $email, string $message, string $empty_message): string
    {
        if ($email === '') {
            return  $empty_message;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return  $message;
        }
        return '';
    }

    public static function validatePassword(string $password, string $password_confirmation, int $password_length = 8, bool $uppercase = true, bool $digit = true): string
    {
        if ($password === '') {
            return  "Le mot de passe est vide";
        }
        if (strlen($password) < $password_length) {
            return "Le mot de passe doit au moins contenir $password_length caractères";
        }
        if ($uppercase && !preg_match("/^[A-Z]+$/", $password)) {
            return "Le mot de passe doit au moins contenir une lettre majuscule";
        }
        if ($digit && !preg_match("/^[0-9]+$/", $password)) {
            return "Le mot de passe doit au moins contenir un chiffre";
        }
        if ($password !== $password_confirmation) {
            return "Les mots de passes ne correspondent pas";
        }
        return '';
    }
}
