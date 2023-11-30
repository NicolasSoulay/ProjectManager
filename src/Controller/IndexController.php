<?php

namespace Nicolas\ProjectManager\Controller;

use Nicolas\ProjectManager\Form\UserForm;
use Nicolas\ProjectManager\Kernel\AbstractController;
use Nicolas\ProjectManager\Kernel\Security;
use Nicolas\ProjectManager\Kernel\View;

class IndexController extends AbstractController
{
    public function index(): void
    {
        $message = '';
        if (isset($_POST['submit']) && $_POST['submit'] === 'login') {
            $message = Security::connectUser($_POST['email'], $_POST['password']);
        }
        if (Security::isConnected()) {
            $view = new View('index', 'Project Manager', [
                'message' => $message,
            ]);
        } else {
            $view = new View('login', 'Connection', [
                'message' => $message,
                'form' => UserForm::createForm("login"),
                'nav_off' => true,
            ]);
        }
        $view->addCss(['bootstrap.min']);
        $view->addJs(['bootstrap.min']);
        $view->render();
    }
}
