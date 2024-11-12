<?php

namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;
use Geometry\Polygon;

class PolygonService{
    public $area;
    public $perimeter;
    public function __construct(public Polygon $polygon1, public Polygon $polygon2){

    }

    public function sumSurfaceAreas(){
        return $this->polygon1->calculateSurfaceArea() + $this->polygon2->calculateSurfaceArea();
    }

    public function sumCircumferences(){
        return $this->polygon1->calculateCircumference() + $this->polygon2->calculateCircumference();
    }

    /**
     * Factory method to generate a polygon of a given type.
     *
     * @param string $shape The type of polygon to generate.
     * @param array $shape_dimensions An array of dimensions for the polygon.
     * @return Polygon The generated polygon.
     */
    public function generatePolygon(string $shape, array $shapeDimensions): Polygon
    {
        return match ($shape) {
            'circle' => new Circle($shapeDimensions[0]),
            'triangle' => new Triangle(...$shapeDimensions),
        };
    }
}
   

