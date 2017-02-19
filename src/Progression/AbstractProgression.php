<?php

namespace TestTask\Progression;

/**
 * Abstract class of numeric progression.
 */
abstract class AbstractProgression
{
    /**
     * @var string Sequence of numbers
     */
    protected $sequence;

    /**
     * Constructor.
     *
     * @param string $sequence
     */
    public function __construct($sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * Checks if numeric sequence is progression of current type.
     *
     * @return bool
     */
    public function check()
    {
        $digits = $this->getSequenceArray();

        $count = count($digits);

        if ($count < 2) {
            return false;
        }

        for($i = 1; $i < $count; $i++) {
            $difference = null;

            for($i = 1; $i < count($digits); $i++) {
                $currentDifference = $this->getDifference($digits[$i-1], $digits[$i]);
                if ($i === 1) {
                    $difference = $currentDifference;
                } else {
                    if ($difference !== $currentDifference) {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    /**
     * Return array of digits. Each digit in sequence are separated by comma and casted to float type.
     *
     * @return array
     */
    protected function getSequenceArray()
    {
        $parts = explode(',', $this->sequence);

        return array_map(function ($element) {
            return (float)trim($element);
        }, $parts);
    }

    /**
     * Returns progression type.
     *
     * @return string
     */
    abstract public function getTypeDescription();

    /**
     * Returns difference of progression.
     *
     * @param float $previousElement
     * @param float $currentElement
     * @return float
     */
    abstract protected function getDifference($previousElement, $currentElement);
}