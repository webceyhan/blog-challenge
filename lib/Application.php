<?php

namespace Lib;

final class Application
{
    private static $instance;
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function __get($name)
    {
        return $this->container->get($name);
    }

    public function run()
    {
        $this->router->dispatch();
    }

    public static function getInstance($container = null): Application
    {
        if (!self::$instance) {
            $container ??= new Container();
            self::$instance = new self($container);
        }

        return self::$instance;
    }
}
