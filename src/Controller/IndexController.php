<?php

namespace Nicolas\ProjectManager\Controller;

use Nicolas\ProjectManager\Kernel\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @param string $message
     */
    public function index(string $message = ''): void
    {
        $this->render('index.php', ['message' => $message]);
    }
}
