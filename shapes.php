<?php

// I check for:
// Readability
// Understandability
// Performance
// Error handling
// Bugs & Logical flaws
// DRY-Principle -> Don't write redundant code
// SOP-Principle -> Each thing does its own thing
// KISS-Principle -> Try to keep it simple
// SOLID-Principle -> https://en.wikipedia.org/wiki/SOLID
// POLA-Principle -> Code should work as one would expect
// YAGNI-Principle -> Don't code stuff you might not need

interface Shape {
    public function area();
    public function perimeter();
}

// Added printer interface because printer class violated several SOLID-Principles
// -> Single responsibility principle. Printer class did not only print but also check what type of shape it was
// -> Open/closed principle. Printer class was not open for extension. If we wanted to add a new shape we would have to change the printer class
// -> Dependency inversion principle. Printer class was dependent of classes, not abstractions
interface Printer {
    public function printShape();
}

// implemented printer interface
// Added types
class Rectangle implements Shape, Printer {
    private float $width;
    private float $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area(): float {
        return $this->width * $this->height;
    }

    public function perimeter(): float {
        return 2 * ($this->width + $this->height);
    }

    // I was unsure to add getters.
    // In the end i decided to add them because it makes the code more robust against future changes.
    public function getWidth(): float {
        return $this->width;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function printShape(): void {
        echo "Rectangle - Width: {$this->getWidth()}, Height: {$this->getHeight()}, Area: {$this->area()}, Perimeter: {$this->perimeter()}\n";
    }
}

// implemented printer interface
class Circle implements Shape, Printer {
    private float $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Pi is a constant, so we can use the built-in constant M_PI
    public function area(): float {
        return M_PI * $this->radius * $this->radius;
    }

    // Pi is a constant, so we can use the built-in constant M_PI
    public function perimeter(): float {
        return 2 * M_PI * $this->radius;
    }

    // I was unsure to add getters.
    // In the end i decided to add them because it makes the code more robust against future changes.
    public function getRadius(): float {
        return $this->radius;
    }

    // Removed unnecessary curly braces around simple variables. Curly braces are only needed when using complex statements.
    // Also removed the "get" prefix, because we can access the variables directly
    public function printShape() : void {
        echo "Circle - Radius: {$this->getRadius()}, Area: {$this->area()}, Perimeter: {$this->perimeter()}\n";
    }
}

$rectangle = new Rectangle(5, 3);
$circle = new Circle(4);

// Making use of the new printer interface
$rectangle->printShape();
$circle->printShape();
