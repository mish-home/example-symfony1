<?php

namespace App\Models;

use App\Interfaces\ShapeInterface;

/**
 * Defines circle model
 */

class CircleModel implements ShapeInterface {

    private float $radius;
    
    /**
     * Radius variable setter
     * @param float $radius
     * @return $this
     */
    public function setRadius(float $radius): self
    {
        $this->radius = $radius;

        return $this;
    }
    
    /**
     * Radius variable getter
     * @return float 
     */
    public function getRadius(): float
    {
        return $this->radius;
    }

    /**
     * Returns float value of surface, rounded to 4th decimal
     * @return float
     */
    public function getSurface(): float
    {
        return round(pi() * pow($this->radius, 2), 4);
    }

    /**
     * Returns float value of circumference, rounded to 4th decimal
     */
    public function getDiameter(): float
    {
        return round(2 * pi() * $this->radius, 4);
    }

    /**
     * Returns array of complete shape data
     * @return array
     */
    public function getObjectData(): array
    {
        return [
            'type' => 'circle',
            'radius' => $this->getRadius(),
            'surface' => $this->getSurface(),
            'circumference' => $this->getDiameter()
        ];
    }

}