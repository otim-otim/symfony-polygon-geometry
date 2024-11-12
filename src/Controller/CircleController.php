<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Circle;

class CircleController extends AbstractController
{
    
   
    #[Route('/circle/{radius}', name: 'app_circle')]
    public function show(int $radius): JsonResponse
    {
        $circle = new Circle($radius);

        return $this->json([
            'type' => 'Circle',
            'radius' => $radius,
            'area' => $circle->calculateSurfaceArea(),
            'circumference' => $circle->calculateCircumference(),
        ]);
    }
}
