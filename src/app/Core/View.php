<?php

declare(strict_types=1);

namespace App\Core;

class View {
    private string $template;
    private array $data;
    public function __construct($template, $data = [])
    {
        $this->template = $template;
        $this->data = $data;

        $this->render($data);
    }

    private function render($data)
    {
        if (count($data)) {
            extract($data);
        }

        include_once(str_replace('/Core', '', __DIR__) . '/view/' . $this->template);
    }
}
