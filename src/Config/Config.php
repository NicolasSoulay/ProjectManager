<?php

namespace Nicolas\ProjectManager\Config;

abstract class Config
{
    const DBNAME = "project_manager";
    const DBHOST = 'localhost';
    const DBUSER = 'test';
    const DBPWD = '1234';
    const ENTITY = 'Nicolas\ProjectManager\Entity\\';
    const CONTROLLER = 'Nicolas\ProjectManager\Controller\\';
    const TEMPLATE_FOLDER = __DIR__ . '/../Views/Templates/';
    const CSS_FOLDER = './src/Assets/css/';
    const JS_FOLDER = './src/Assets/js/';
    const DEFAULT_CONTROLLER = 'IndexController';
    const DEFAULT_METHOD = 'index';
}
