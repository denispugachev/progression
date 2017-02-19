<?php

namespace TestTask;

use TestTask\Progression\AbstractProgression;
use TestTask\Progression\ArithmeticProgression;
use TestTask\Progression\GeometricProgression;

/**
 * Component that performs checking of provided numeric sequence string on each known type of progressions.
 */
class CheckerComponent
{
    /**
     * @var array Progressions class names
     */
    protected $progressionsClassNames = [
        ArithmeticProgression::class,
        GeometricProgression::class
    ];

    /**
     * Checks if sequence is progression of each known type and returns array of correct types.
     *
     * @param string$sequence
     * @return array
     */
    public function check($sequence)
    {
        $validTypes = [];

        foreach ($this->progressionsClassNames as $className) {
            /** @var AbstractProgression $progression */
            $progression = new $className($sequence);

            if ($progression->check()) {
                $validTypes[] = $progression->getTypeDescription();
            }
        }

        return $validTypes;
    }
}