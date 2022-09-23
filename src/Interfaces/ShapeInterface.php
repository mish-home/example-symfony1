<?php

namespace App\Interfaces;


/**
 * Defines shape calculation methods
 */
interface ShapeInterface {

    const CIRCLE = 'circle';
    const TRIANGLE = 'triangle';

    /**
     * @return float
     */
    public function getSurface(): float;

    /**
     * @return float
     */
    public function getDiameter(): float;

    /**
     * @return array
     */
    public function getObjectData(): array;

}