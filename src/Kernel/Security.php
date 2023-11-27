<?php

namespace Nicolas\ProjectManager\Kernel;

class Security
{
    public static function connectUser(string $email, string $password)
    {
        $user = Model::getInstance()->getByAttribute('UserAccount', 'email', $email)[0];

        if (!empty($user)) {
            return "l'utilisateur $email n'existe pas";
        }
        if (!password_verify($password, $user->getPassword())) {
            return "le mot de passe est incorrect";
        }
        session_start();
        $_SESSION['connected'] = true;
        $_SESSION['connected_user'] = $user;
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
}
