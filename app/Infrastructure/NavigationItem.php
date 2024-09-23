<?php

namespace App\Infrastructure;

final readonly class NavigationItem
{
    public function __construct(
        public string $name,
        public string $route,
    ) {}

    public static function from(string $name, string $route): self
    {
        return new self($name, $route);
    }

    public function url(): string
    {
        return route($this->route);
    }

    public function isActive(): bool
    {
        return request()->route()->getName() === $this->route;
    }

    public function __get(string $name): mixed
    {
        if ($name === 'url') {
            return $this->url();
        }

        if ($name === 'isActive') {
            return $this->isActive();
        }

        return $this->{$name};
    }
}
