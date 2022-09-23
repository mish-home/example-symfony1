<?php

namespace App\Models;

use App\Interfaces\ShapeInterface;

/**
 * Defines triangle model
 */

class TriangleModel implements ShapeInterface {

    private float $sideA;
    private float $sideB;
    private float $sideC;
    
    /**
     * Side 1/3 setter
     * @param float $sideA
     * @return $this
     */
    public function setSideA(float $sideA): self
    {
        $this->sideA = $sideA;

        return $this;
    }
        
    /**
     * Side 2/3 setter
     * @param float $sideB
     * @return $this
     */
    public function setSideB(float $sideB): self
    {
        $this->sideB = $sideB;

        return $this;
    }
        
    /**
     * Side 3/3 setter
     * @param float $sideC
     * @return $this
     */
    public function setSideC(float $sideC): self
    {
        $this->sideC = $sideC;

        return $this;
    }
    
    /**
     * SideA variable getter
     * @return float 
     */
    public function getSideA(): float
    {
        return $this->sideA;
    }

    /**
     * SideB variable getter
     * @return float 
     */
    public function getSideB(): float
    {
        return $this->sideB;
    }

    /**
     * SideC variable getter
     * @return float 
     */
    public function getSideC(): float
    {
        return $this->sideC;
    }

    /**
     * Returns float value of surface, rounded to 4th decimal
     * @return float
     */
    public function getSurface(): float
    {
        $surface = sqrt($this->getDiameter() * ($this->getDiameter() - $this->sideA) * ($this->getDiameter() - $this->sideB) * ($this->getDiameter() - $this->sideC));

        return round($surface, 4);
    }

    /**
     * Returns float value of circumference, rounded to 4th decimal
     */
    public function getDiameter(): float
    {
        return round($this->sideA + $this->sideB + $this->sideC, 4);
    }

    /**
     * Returns array of complete shape data
     * @return array
     */
    public function getObjectData(): array
    {
        return [
            'type' => 'triangle',
            'a' => $this->getSideA(),
            'b' => $this->getSideB(),
            'c' => $this->getSideC(),
            'surface' => $this->getSurface(),
            'circumference' => $this->getDiameter()
        ];
    }

}