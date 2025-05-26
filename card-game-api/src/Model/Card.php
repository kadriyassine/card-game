<?php

namespace App\Model;

class Card
{
    public function __construct(
        private string $color,
        private string $value
    ) {}

    public function getColor(): string
    {
        return $this->color;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'value' => $this->value,
        ];
    }
}
