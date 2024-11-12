<?php

namespace App\Controller;

use App\Service\PolygonService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

class CalculatorController extends AbstractController
{

    #[Route('/geometry/calculator', name: 'geometry_calculator')]
   
    public function sum_shape_contexts(Request $request, ValidatorInterface $validator): JsonResponse
    {
        // dd($request);
        // Define validation constraints
   $constraints = new Assert\Collection([
       'context' => new Assert\Choice(['choices' => ['area', 'circumference'], 'message' => 'Invalid context']),
       'shape1' => new Assert\NotBlank(['message' => 'Shape 1 is required']),
       'shape1dimensions' => new Assert\Type(['type' => 'array', 'message' => 'Shape 1 dimensions must be an array']),
       'shape2' => new Assert\NotBlank(['message' => 'Shape 2 is required']),
       'shape2dimensions' => new Assert\Type(['type' => 'array', 'message' => 'Shape 2 dimensions must be an array']),
   ]);
       // Get data from request
       $data = $request->query->all();

       // Validate request data
       $errors = $validator->validate($data, $constraints);

       if (count($errors) > 0) {
           // Collect validation errors
           $errorMessages = [];
           foreach ($errors as $error) {
               $errorMessages[] = $error->getMessage();
           }

           return $this->json(['errors' => $errorMessages], JsonResponse::HTTP_BAD_REQUEST);
       }

       try {
           // Extract validated data
           $context = $data['context'];
           $shape1 = $data['shape1'];
           $shape1dimensions = $data['shape1dimensions'];
           $shape2 = $data['shape2'];
           $shape2dimensions = $data['shape2dimensions'];




            // Instantiate PolygonService and generate polygons
            $polygonService = new PolygonService();
            $polygon1 = $polygonService->generatePolygon($shape1, $shape1dimensions);
            $polygon2 = $polygonService->generatePolygon($shape2, $shape2dimensions);

            // Calculate the result based on context
            switch($context) {
                case 'area':
                    $result = $polygonService->sumSurfaceAreas($polygon1, $polygon2);
                    break;
                case 'circumference':
                    $result = $polygonService->sumCircumferences($polygon1, $polygon2);
                    break;
                default:
                    $result = 'what context do u want to add ?';
                    break;
            }
            return $this->json([
                'result' => $result
            ]);
        } catch (\Throwable $th) {
            throw $th;
            return $this->json([
                'error' => '$th->getMessage()'
            ], $th->getCode());
        }

    }

    


}
