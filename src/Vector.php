<?php
namespace App;

class Vector
{
    public float $x;
    public float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    // Вычисление длины вектора
    public function length(): float
    {
        return sqrt($this->x ** 2 + $this->y ** 2);
    }

    // Проверка на нулевой вектор
    public function isZero(): bool
    {
        return $this->x == 0 && $this->y == 0;
    }

    // Проверка перпендикулярности
    public function isPerpendicular(Vector $vector): bool
    {
        return $this->x * $vector->x +
               $this->y * $vector->y == 0;
    }
}
