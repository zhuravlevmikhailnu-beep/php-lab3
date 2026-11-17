<?php
namespace App;

class Point
{
    public float $x;
    public float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    // Перемещение точки по оси X
    public function moveX(float $value): void
    {
        $this->x += $value;
    }

    // Перемещение точки по оси Y
    public function moveY(float $value): void
    {
        $this->y += $value;
    }

    // Перемещение точки на вектор
    public function moveByVector(Vector $vector): void
    {
        $this->x += $vector->x;
        $this->y += $vector->y;
    }
}
