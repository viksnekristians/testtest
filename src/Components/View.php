<?php

namespace App\Components;

class View 
{
    /*private string $viewName;
    private array $data;
    private string $layoutPath;*/
    private string $contentPath;

    const DEFAULT_LAYOUT_PATH = PROJECT_LAYOUT_DIR . "/default.php";

    public function __construct(private string $viewName, private array $data, private string $layoutPath = self::DEFAULT_LAYOUT_PATH)
    {

    }

    public function render() {
        if (!empty($this->data)) {
            extract($this->data);
        }
        $this->contentPath = PROJECT_VIEW_DIR . "/$this->viewName.php";
        include $this->layoutPath;
    }

}
