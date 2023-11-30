<?php

namespace Nicolas\ProjectManager\Kernel;

class AbstractController
{

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function generateUrl(string $controller, string $method, array|null $query = null): string
    {
        $url = "?controller=" . $controller . "&method=" . $method;
        if (is_array($query) && count($query) > 0) {
            foreach ($query as $key => $value) {
                $url .= "&" . $key . "=" . $value;
            }
        }
        return $url;
    }

    public function redirectIndex()
    {
        header('Location: http://127.0.0.1/ProjectManager');
        exit();
    }

    public function redirect(string $controller, string $method, array|null $query = null)
    {
        $url = $this->generateUrl($controller, $method, $query);
        header('Location: http://127.0.0.1/ProjectManager' . $url);
        exit();
    }
}
