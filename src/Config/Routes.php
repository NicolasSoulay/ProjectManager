<?php

namespace Nicolas\ProjectManager\Config;

abstract class Routes
{
    // each routes should declared as follow:
    // '<url>' => ['controller_name', 'methode_name'],
    const ROUTES = [
        'Home' => ['ProjectController', 'index'],
        'Project' => ['TaskController', 'index'],
        'Disconnect' => ['UserController', 'disconnect'],
        'AccountCreation' => ['UserController', 'createUser'],
    ];
}
