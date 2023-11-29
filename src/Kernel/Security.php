<?php

namespace Nicolas\ProjectManager\Kernel;

class Security
{
    public static function connectUser(string $email, string $password)
    {
        $user = Model::getInstance()->getByAttribute('UserAccount', ['email' => $email]);

        if (empty($user)) {
            return "l'utilisateur $email n'existe pas";
        }
        if (!password_verify($password, $user[0]->getPassword())) {
            return "le mot de passe est incorrect";
        }
        if (session_status() != 2) {
            session_start();
        }
        $_SESSION['connected'] = true;
        $_SESSION['connected_user'] = $user[0];
        return "Bienvenue " . $user[0]->getFirstName() . " " . $user[0]->getLastName();
    }
    // TODO : refaire les methodes disconnect et isConnected
    public static function disconnect(): void
    {
        if (session_status() != 2) {
            session_start();
        }
        session_destroy();
    }

    public static function isConnected(): bool
    {
        if (session_status() != 2) {
            session_start();
        }
        if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
            return true;
        }
        session_destroy();
        return false;
    }

    public static function isUsed(string $entity, string $attribute, string $value): bool
    {
        if (empty(Model::getInstance()->getByAttribute($entity, [$attribute => $value]))) {
            return false;
        }
        return true;
    }
}
