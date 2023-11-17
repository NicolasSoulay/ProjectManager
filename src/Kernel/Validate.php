<?php

namespace Nicolas\ProjectManager\Kernel;

abstract class Validate
{
    public static function validateNom($nom, $message, $messageVide)
    {
        $return = '';
        $pattern = "/^[\p{L}\p{M} '-]*$/mu";
        if ($nom === '') {
            $return = $messageVide;
        } else {
            if (!preg_match($pattern, $nom)) {
                $return = $message;
            }
        }
        return $return;
    }

    public static function validateEmail($email, $message, $messageVide)
    {
        $return = '';
        if ($email === '') {
            $return = $messageVide;
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $return = $message;
            }
        }
        return $return;
    }
}
