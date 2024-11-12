<?php

// src/Geometry/ShapeInterface.php

namespace Geometry;

interface Polygon
{
    // Method to calculate the area of the shape
    public function calculateSurfaceArea(): float;

    // Method to calculate the perimeter (circumference) of the shape
    public function calculateCircumference(): float;
}
