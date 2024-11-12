<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Triangle;

class TriangleController extends AbstractController
{
    #[Route('/triangle/{a}/{b}/{c}', name: 'app_triangle')]
    public function show($side1, $side2, $side3): JsonResponse
    {
        $triangle = new Triangle($side1, $side2, $side3);



        return $this->json([
            'type' => 'Triangle',
            'a' => $side1,
            'b' => $side2,
            'c' => $side3,
            'surface' => $triangle->calculateSurfaceArea(),
            'circumference' => $triangle->calculateCircumference(),
        ]);
    }
}
