<?php

namespace Nicolas\ProjectManager\Controller;

use Nicolas\ProjectManager\Kernel\AbstractController;
use Nicolas\ProjectManager\Kernel\View;

class IndexController extends AbstractController
{
    /**
     * @param string $message
     */
    public function index(string $message = ''): void
    {
        $view = new View('index', 'Page de Test', ['message' => $message]);
        $view->addCss(['bootstrap.min', 'main']);
        $view->addJs(['bootstrap.min']);
        $view->render();
    }
}
