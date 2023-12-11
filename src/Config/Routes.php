<?php

namespace Nicolas\ProjectManager\Config;

abstract class Routes
{
    // each routes should declared as follow:
    // '<url>' => ['controller_name', 'methode_name'],
    const ROUTES = [
        'Home' => ['ProjectController', 'index'],
        'AccountCreation' => ['UserController', 'create'],
        'User' => ['UserController', 'update'],
        'Disconnect' => ['UserController', 'disconnect'],
        'Project' => ['TaskController', 'index'],
        'DeleteProject' => ['ProjectController', 'delete'],
        'CreateProject' => ['ProjectController', 'create'],
    ];
}
