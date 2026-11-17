
<?php

require_once __DIR__ . '/src/MagicClass.php';
require_once __DIR__ . '/src/Point.php';
require_once __DIR__ . '/src/Vector.php';

use App\MagicClass;
use App\Point;
use App\Vector;

// Демонстрация магических методов
echo "<h2>Магические методы</h2>";

$magic = new MagicClass();

$magic->unknownMethod();
MagicClass::unknownStaticMethod();

$magic->name = "Test";
echo $magic->name;

isset($magic->name);
unset($magic->name);

echo $magic . "<br>";

$magic();

$clone = clone $magic;

serialize($magic);

var_dump($magic);

eval('$restored = ' . var_export($magic, true) . ';');

// Демонстрация геометрии
echo "<h2>Геометрия</h2>";

// Создание точки
$T1 = new Point(3, 4);

// Создание векторов
$V1 = new Vector(3, 4);
$V2 = new Vector(0, 0);
$V3 = new Vector(-4, 3);

// Вывод длины векторов
echo "Длина V1: " . $V1->length() . "<br>";
echo "Длина V2: " . $V2->length() . "<br>";
echo "Длина V3: " . $V3->length() . "<br>";

// Проверка нулевого вектора
echo "V2 нулевой: ";
echo $V2->isZero() ? "Да<br>" : "Нет<br>";

// Проверка перпендикулярности
echo "V1 и V3 перпендикулярны: ";
echo $V1->isPerpendicular($V3) ? "Да<br>" : "Нет<br>";

// Перемещение точки на вектор V1
$T1->moveByVector($V1);

echo "Новые координаты T1: ";
echo "X = {$T1->x}, Y = {$T1->y}<br>";
