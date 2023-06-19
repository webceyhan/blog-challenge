<?php

function app(): Lib\Application
{
    return Lib\Application::getInstance();
}

function auth(): stdClass|null
{
    $user = app()->session->get('auth');

    return $user ? (object) $user : null;
}

function view(string $path, array $data = []): string
{
    return app()->view->render($path, $data);
}

function redirect(string $path): void
{
    header("Location: $path");
    exit;
}
