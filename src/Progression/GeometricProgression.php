<?php

namespace TestTask\Progression;

/**
 * Geometric progression class.
 */
class GeometricProgression extends AbstractProgression
{
    /** {@inheritDoc} */
    public function getTypeDescription()
    {
        return 'Geometric';
    }

    /**
     * Geometric progression difference is division between elements.
     * {@inheritDoc}
     */
    protected function getDifference($previousElement, $currentElement)
    {
        return $currentElement / $previousElement;
    }
}