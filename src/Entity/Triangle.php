<?php

// src/Geometry/Triangle.php

namespace App\Entity;

use Geometry\Polygon;

class Triangle implements Polygon
{

    public function __construct(public float $side1,public float $side2,public float $side3)
    {
        
    }

    public function calculateSurfaceArea(): float
    {
       //use herons rule to calculate surface area
        $s = $this->calculateCircumference() / 2;
        return sqrt($s * ($s - $this->side1) * ($s - $this->side2) * ($s - $this->side3));
    }

    public function calculateCircumference(): float
    {
        // Perimeter of triangle = side1 + side2 + side3
        return $this->side1 + $this->side2 + $this->side3;
    }
}
