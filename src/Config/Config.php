<?php

namespace Nicolas\ProjectManager\Config;

class Config
{
    const DBNAME = "project_manager";
    const DBHOST = 'localhost';
    const DBUSER = 'test';
    const DBPWD = '1234';
    const ENTITY = 'Nicolas\ProjectManager\Entity\\';
    const CONTROLLER = 'Nicolas\ProjectManager\Controller\\';
    const DEFAULT_CONTROLLER = 'IndexController';
    const DEFAULT_METHOD = 'index';
}
