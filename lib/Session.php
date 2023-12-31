<?php 

namespace Lib;

class Session {

    public function __construct()
    {
        session_start();
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }
}