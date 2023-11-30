<?php

namespace Nicolas\ProjectManager\Kernel;

use Nicolas\ProjectManager\Config\Config;

class View
{
    private string $file_name;
    private array $vars;
    public array $css_files = ['css_files' => ''];
    private array $js_files = ['js_files' => ''];
    protected static string $template_folder = Config::TEMPLATE_FOLDER;

    /**
     * @param array<string,mixed> $vars
     */
    public function __construct(string $file_name, string $page_title, array $vars = [])
    {
        $this->file_name = __DIR__ . "/../Views/" . $file_name . ".php";
        $vars['page_title'] = $page_title;
        $this->vars = $vars;
    }

    private function getHead(): string
    {
        return self::$template_folder . "head.php";
    }

    private function getHeader(): string
    {
        return self::$template_folder . "header.php";
    }

    private function getFooter(): string
    {
        return self::$template_folder . "footer.php";
    }

    /**
     * @param array<int,string> $css_files
     */
    public function addCss(array $css_files): void
    {
        foreach ($css_files as $css_file) {
            $this->css_files['css_files'] .= "<link href='" . Config::CSS_FOLDER . $css_file . ".css' rel='stylesheet'>";
        }
    }

    /**
     * @param array<int,string> $js_files
     */
    public function addJs(array $js_files): void
    {
        foreach ($js_files as $js_file) {
            $this->js_files["js_files"] .= "<script src='" . Config::JS_FOLDER . $js_file . ".js' defer></script>";
        }
    }

    public function render(): void
    {
        extract($this->vars);
        extract($this->css_files);
        extract($this->js_files);
        ob_start();
        include_once $this->getHead();
        include_once $this->getHeader();
        include_once $this->file_name;
        include_once $this->getFooter();
        ob_end_flush();
    }
}
