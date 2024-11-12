<?php

namespace App\Controller;

use App\Service\PolygonService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class CalculatorController extends AbstractController
{

    #[Route('/calculator/{context}/{shape1}/{shape1dimensions}/{shape2}/{shape2dimensions}', name: 'geometry_calculator')]
   
    public function sum_shape_contexts($context, $shape1, $shape1dimensions, $shape2, $shape2dimensions): JsonResponse
    {
        $polygon_service = new PolygonService();
        $polygon1 = 
        switch($context) {
            case 'area':

    }

    public function getPolygon


}
