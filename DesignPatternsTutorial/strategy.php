<?php

// Abstract base class
abstract class Shape {
    abstract public function describe(): string;
    abstract public function calculateArea(): float;
}

// Context class using strategy
class ShapeContext {
    private Shape $strategy;

    public function setStrategy(Shape $strategy): void {
        $this->strategy = $strategy;
    }

    public function describe(): string {
        return $this->strategy->describe();
    }

    public function calculateArea(): float {
        return $this->strategy->calculateArea();
    }
}

// Concrete strategies
class Circle extends Shape {
    private float $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
    }

    public function describe(): string {
        return "This is a circle.";
    }

    public function calculateArea(): float {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    private float $width;
    private float $height;

    public function __construct(float $width, float $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function describe(): string {
        return "This is a rectangle.";
    }

    public function calculateArea(): float {
        return $this->width * $this->height;
    }
}

class Triangle extends Shape {
    private float $base;
    private float $height;

    public function __construct(float $base, float $height) {
        $this->base = $base;
        $this->height = $height;
    }

    public function describe(): string {
        return "This is a triangle.";
    }

    public function calculateArea(): float {
        return 0.5 * $this->base * $this->height;
    }
}

// Main function
function main() {
    $context = new ShapeContext();

    $context->setStrategy(new Circle(5));
    echo "Circle: " . $context->describe() . "\n";
    echo "Area: " . $context->calculateArea() . "\n\n";

    $context->setStrategy(new Rectangle(4, 6));
    echo "Rectangle: " . $context->describe() . "\n";
    echo "Area: " . $context->calculateArea() . "\n\n";

    $context->setStrategy(new Triangle(3, 8));
    echo "Triangle: " . $context->describe() . "\n";
    echo "Area: " . $context->calculateArea() . "\n";

}

main();
