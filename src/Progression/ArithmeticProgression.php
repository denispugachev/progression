<?php

namespace TestTask\Progression;

/**
 * Arithmetic progression class.
 */
class ArithmeticProgression extends AbstractProgression
{
    /** {@inheritDoc} */
    public function getTypeDescription()
    {
        return 'Arithmetic';
    }

    /**
     * Arithmetic progression difference is subtraction between elements.
     * {@inheritDoc}
     */
    protected function getDifference($previousElement, $currentElement)
    {
        return $currentElement - $previousElement;
    }
}