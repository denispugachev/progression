<?php

namespace Tests\Unit\Progression;

use Codeception\Test\Unit;
use TestTask\Progression\AbstractProgression;

/**
 * Unit-tests for AbstractProgression class.
 */
class AbstractProgressionTest extends Unit
{
    /**
     * Unit-test for constructor method:
     * - constructor should assign properties from arguments.
     *
     * @see AbstractProgression::__construct()
     */
    public function testConstruct()
    {
        $sequences = [
            '1,2,3,4,5,6,7,8,9,10',
            '9,8,7,6,5',
            '2,4,8,16',
        ];

        $property = new \ReflectionProperty(AbstractProgression::class, 'sequence');
        $property->setAccessible(true);

        foreach ($sequences as $sequence) {
            $progression = $this->getMockBuilder(AbstractProgression::class)->setMethods(['getTypeDescription', 'getDifference'])
                ->setConstructorArgs([$sequence])->getMock();

            $this->assertEquals($sequence, $property->getValue($progression));
        }
    }

    /**
     * Unit-test for method getSequenceArray():
     * - method should correctly parse string and return array of numbers.
     *
     * @see AbstractProgression::getSequenceArray()
     */
    public function testGetSequenceArray()
    {
        $progression = $this->getMockBuilder(AbstractProgression::class)->setMethods(['getTypeDescription', 'getDifference'])
            ->disableOriginalConstructor()->getMock();

        $method = new \ReflectionMethod(AbstractProgression::class, 'getSequenceArray');
        $method->setAccessible(true);

        $property = new \ReflectionProperty(AbstractProgression::class, 'sequence');
        $property->setAccessible(true);

        $tests = [
            '1,2,3,4,5,6,7,8' => [1, 2, 3, 4, 5, 6, 7, 8],
            'a,b,c,d,e,f,g' => [0, 0, 0, 0, 0, 0, 0],
            '1,   5   , 9    ,10' => [1, 5, 9, 10],
            '1.25, 5, 4.444, 6' => [1.25, 5, 4.444, 6],
        ];

        foreach ($tests as $sequence => $expected) {
            $property->setValue($progression, $sequence);
            $this->assertEquals($expected, $method->invoke($progression));
        }
    }
}