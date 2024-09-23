<?php

namespace App\Infrastructure;

final class Navigation implements \IteratorAggregate
{
    private function __construct(
        private array $items,
    ) {}

    public static function from(NavigationItem ...$items): self
    {
        return new self(array_values($items));
    }

    public function getIterator(): \Traversable
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }
}
