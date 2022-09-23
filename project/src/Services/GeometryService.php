<?php

namespace App\Services;


use App\Models\CircleModel;
use App\Models\TriangleModel;

class GeometryService
{

    public CircleModel $circleModel;
    public TriangleModel $triangleModel;

    /**
     * @param CircleModel $circleModel
     * @param TriangleModel $triangleModel
     */
    public function __construct(CircleModel $circleModel, TriangleModel $triangleModel)
    {
        $this->circleModel = $circleModel;
        $this->triangleModel = $triangleModel;
    }

    /**
     * Returns surface of circle with given radius
     * @param float $radius
     * @return float
     */
    public function circleSurface(float $radius): float
    {
        $this->circleModel->setRadius($radius);
        return $this->circleModel->getSurface();
    }

    /**
     * Returns circumferense of cirle with given radius
     * @param float $radius
     * @return float
     */
    public function circleDiameter(float $radius): float
    {
        $this->circleModel->setRadius($radius);
        return $this->circleModel->getDiameter();
    }

    /**
     * Returns object data of cirle with given radius
     * @param float $radius
     * @return array
     */
    public function circleObjectData(float $radius): array
    {
        $this->circleModel->setRadius($radius);
        return $this->circleModel->getObjectData();
    }

    /**
     * Returns surface of triangle with three given side lengths
     * @param float $sideOne
     * @param float $sideTwo
     * @param float $sideThree
     * @return float
     */
    public function triangleSurface(float $sideOne, float $sideTwo, float $sideThree): float
    {
        $this->triangleModel->setSideA($sideOne);
        $this->triangleModel->setSideB($sideTwo);
        $this->triangleModel->setSideC($sideThree);

        return $this->triangleModel->getSurface();
    }

    /**
     * Returns circumferense of triangle with three given side lengths
     * @param float $sideOne
     * @param float $sideTwo
     * @param float $sideThree
     * @return float
     */
    public function triangleDiameter(float $sideOne, float $sideTwo, float $sideThree): float
    {
        $this->triangleModel->setSideA($sideOne);
        $this->triangleModel->setSideB($sideTwo);
        $this->triangleModel->setSideC($sideThree);

        return $this->triangleModel->getDiameter();
    }

    /**
     * Returns object data of triangle with three given side lengths
     * @param float $sideOne
     * @param float $sideTwo
     * @param float $sideThree
     * @return array
     */
    public function triangleObjectData(float $sideOne, float $sideTwo, float $sideThree): array
    {
        $this->triangleModel->setSideA($sideOne);
        $this->triangleModel->setSideB($sideTwo);
        $this->triangleModel->setSideC($sideThree);

        return $this->triangleModel->getObjectData();
    }

}