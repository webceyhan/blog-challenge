<?php

namespace Lib;

use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{

    private $services = [];

    public function __construct(array $services = [])
    {
        $this->services = $services;
    }

    public function has(string $id): bool
    {
        return isset($this->services[$id]);
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new NotFoundExceptionInterface("Service $id not found");
        }

        $service = $this->services[$id];

        if (is_callable($service)) {
            return $service($this);
        }

        return $service;
    }

    public function set(string $id, $service)
    {
        $this->services[$id] = $service;
    }

    public function singleton(string $id, $service)
    {
        $this->services[$id] = function () use ($service) {
            static $resolved;

            if (!$resolved) {
                $resolved = $service($this);
            }

            return $resolved;
        };
    }
}
