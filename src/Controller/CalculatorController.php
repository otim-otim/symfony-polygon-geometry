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
        try {
            //code...
            $polygon_service = new PolygonService();
            $polygon1 = $polygon_service->generatePolygon($shape1, $shape1dimensions);
            $polygon2 = $polygon_service->generatePolygon($shape2, $shape2dimensions);
            switch($context) {
                case 'area':
                    $result = $polygon_service->sumSurfaceAreas($polygon1, $polygon2);
                    break;
                case 'circumference':
                    $result = $polygon_service->sumCircumferences($polygon1, $polygon2);
                    break;
                default:
                    $result = null;
                    break;
            }
            return $this->json([
                'result' => $result
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->json([
                'error' => '$th->getMessage()'
            ], $th->getCode());
        }

    }

    


}
