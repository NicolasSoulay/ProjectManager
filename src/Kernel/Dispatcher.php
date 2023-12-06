<?php

namespace Nicolas\ProjectManager\Kernel;

use Nicolas\ProjectManager\Config\Config;
use Nicolas\ProjectManager\Config\Routes;

class Dispatcher
{
    public static function dispatch(): void
    {
        $c = false;
        $m = false;
        foreach (Routes::ROUTES as $route => $variables) {
            if (isset($_GET[$route])) {

                $c = Config::CONTROLLER . $variables[0];
                $controller = new $c();

                $m = $variables[1];
                $controller->$m();
                return;
            }
        }
        $c = Config::CONTROLLER . Config::DEFAULT_CONTROLLER;
        $m = Config::DEFAULT_METHOD;
        $controller = new $c();
        $controller->$m();
    }
}
