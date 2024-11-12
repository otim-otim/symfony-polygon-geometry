<?php

namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;
use Geometry\Polygon;

class PolygonService{
    

    public function sumSurfaceAreas(Polygon $polygon1,Polygon $polygon2){
        return $polygon1->calculateSurfaceArea() + $polygon2->calculateSurfaceArea();
    }

    public function sumCircumferences(Polygon $polygon1,Polygon $polygon2){
        return $polygon1->calculateCircumference() + $polygon2->calculateCircumference();
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
   

