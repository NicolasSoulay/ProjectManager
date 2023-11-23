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

    public function render($view, $vars): void
    {
        extract($vars);
        include_once(__DIR__ . '/../Views/Templates/head.php');
        include_once(__DIR__ . '/../Views/Templates/header.php');
        include_once(__DIR__ . '/../Views/' . $view);
        include_once(__DIR__ . '/../Views/Templates/footer.php');
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
}
