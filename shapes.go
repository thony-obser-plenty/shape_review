package main

import "fmt"

// Shape interface represents a geometric shape
type Shape interface {
	Area() float64
	Perimeter() float64
}

// Rectangle represents a rectangle shape
type Rectangle struct {
	Width  float64
	Height float64
}

// Circle represents a circle shape
type Circle struct {
	Radius float64
}

// Area calculates the area of the rectangle
func (r Rectangle) Area() float64 {
	return r.Width * r.Height
}

// Perimeter calculates the perimeter of the rectangle
func (r Rectangle) Perimeter() float64 {
	return 2 * (r.Width + r.Height)
}

// Area calculates the area of the circle
func (c Circle) Area() float64 {
	return 3.14 * c.Radius * c.Radius
}

// Perimeter calculates the perimeter of the circle
func (c Circle) Perimeter() float64 {
	return 2 * 3.14 * c.Radius
}

// Printer represents a printer that can print shapes
type Printer struct{}

// PrintShape prints the details of the shape
func (p Printer) PrintShape(s Shape) {
	if rectangle, ok := s.(Rectangle); ok {
		fmt.Printf("Rectangle - Width: %.2f, Height: %.2f, Area: %.2f, Perimeter: %.2f\n",
			rectangle.Width, rectangle.Height, rectangle.Area(), rectangle.Perimeter())
	} else if circle, ok := s.(Circle); ok {
		fmt.Printf("Circle - Radius: %.2f, Area: %.2f, Perimeter: %.2f\n",
			circle.Radius, circle.Area(), circle.Perimeter())
	} else {
		fmt.Println("Unsupported shape type")
	}
}
