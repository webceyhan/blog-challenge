<?php

namespace Lib;

class View
{
    public function render(string $path, array $data = []): string
    {
        // render content view with data
        $content = $this->renderView($path, $data);

        // render layout view with injected content
        $layout = $this->renderView('layout', ['content' => $content]);

        return $layout;
    }

    private function renderView(string $path, array $data = []): string
    {
        // extract view data to current scope
        extract($data);
        ob_start();

        require VIEWS_DIR . '/' . $path . '.php';

        return ob_get_clean();
    }
}
