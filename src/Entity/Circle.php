<?php

namespace App\Entity;


use Geometry\Polygon;

class Circle implements Polygon
{
    public function __construct(public float $radius)
    {
        
    }
    

    public function calculateSurfaceArea(): float
    {
        return 3.14 * $this->radius * $this->radius;
    }

    public function calculateCircumference(): float
    {
        return 2 * 3.14 * $this->radius;
    }
}
