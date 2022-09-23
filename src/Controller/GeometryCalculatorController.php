<?php

namespace App\Controller;

use App\Models\CircleModel;
use App\Models\TriangleModel;
use App\Services\GeometryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeometryCalculatorController extends AbstractController
{

    public GeometryService $geometryService;

    public function __construct(GeometryService $geometryService)
    {
        $this->geometryService = $geometryService;
    }

    /**
     * @Route("/circle/{radius<\d+>?0}", methods="GET")
     */
    public function doCircle(Request $request)
    {
        if(!$request->get('radius'))
            return $this->noAttributesDefined();

        return $this->response($this->geometryService->circleObjectData($request->get('radius')));
    }


    /**
     * @Route("/triangle/{sideOne<\d+>?0}/{sideTwo<\d+>?0}/{sideThree<\d+>?0}", name="geometry_calculator_triangle", methods="GET")
     */
    public function doTriangle(Request $request)
    {
        if(!$request->get('sideOne') || !$request->get('sideTwo') || !$request->get('sideThree'))
            return $this->noAttributesDefined();

        return $this->response($this->geometryService->triangleObjectData($request->get('sideOne'), $request->get('sideTwo'), $request->get('sideThree')));
    }

    /**
     * @return Response
     */
    private function noAttributesDefined(): Response
    {
        /**
         * Returning error if no attributes are defined, or partially defined
         */
        $response = new Response(
            json_encode(
                [
                    'response'=>'Error',
                    'message' => 'Shape attributes not defined! Please define.'
                ]
                ),
                404
        );
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }

    /**
     * @param array $data
     * @return Response
     */
    private function response(array $data): Response
    {
        /**
         * Creating respons object, pushing body data, setting header to be json
         */
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}
