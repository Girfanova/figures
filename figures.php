<?php
declare(strict_types=1);

//Прямоугольник
class Rectangle
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(): float
    {
        return $this->width * $this->height;
    }

    public function output(): string
    {
        return "Прямоугольник, {$this->width}x{$this->height}";
    }

}

//Круг
class Circle
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getArea(): float
    {
        return pi() * $this->radius ** 2;
    }

    public function output(): string
    {
        return "Круг, r{$this->radius}";
    }

}

//создание фигур
class FigureGenerator
{

    public static function generateFigures(int $count): array
    {
        $figures = [];
        for ($i = 0; $i < $count; $i++) {
            if (random_int(0, 1) === 0) {
                $width = mt_rand(1, 100);
                $height = mt_rand(1, 100);
                $figures[] = new Rectangle($width, $height);
            } else {
                $radius = mt_rand(1, 100);
                $figures[] = new Circle($radius);
            }
        }
        return $figures;
    }

}

//генерация 10 фигур
$figures = FigureGenerator::generateFigures(10);

//сортировка по возрастанию площади
usort($figures, function ($figure1, $figure2) {
    return $figure1->getArea() <=> $figure2->getArea();
});

//вывод на экран
foreach ($figures as $figure) {
    echo $figure->output() . "<br>";
}

