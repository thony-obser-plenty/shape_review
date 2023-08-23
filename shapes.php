<?php

// Shape interface represents a geometric shape
interface Shape {
    public function area();
    public function perimeter();
}

// Rectangle represents a rectangle shape
class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }

    public function perimeter() {
        return 2 * ($this->width + $this->height);
    }
}

// Circle represents a circle shape
class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return 3.14 * $this->radius * $this->radius;
    }

    public function perimeter() {
        return 2 * 3.14 * $this->radius;
    }
}

// Printer represents a printer that can print shapes
class Printer {
    public function printShape(Shape $shape) {
        if ($shape instanceof Rectangle) {
            echo "Rectangle - Width: {$shape->getWidth()}, Height: {$shape->getHeight()}, Area: {$shape->area()}, Perimeter: {$shape->perimeter()}\n";
        } elseif ($shape instanceof Circle) {
            echo "Circle - Radius: {$shape->getRadius()}, Area: {$shape->area()}, Perimeter: {$shape->perimeter()}\n";
        } else {
            echo "Unsupported shape type\n";
        }
    }
}

$rectangle = new Rectangle(5, 3);
$circle = new Circle(4);

$printer = new Printer();
$printer->printShape($rectangle);
$printer->printShape($circle);
