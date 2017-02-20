<?php

namespace Tests\Unit\Progression;

use Codeception\Test\Unit;
use TestTask\Progression\ArithmeticProgression;

/**
 * Unit-tests for ArithmeticProgression class.
 */
class ArithmeticProgressionTest extends Unit
{
    /**
     * Unit-test for method getTypeDescription():
     * - method returns not empty string.
     *
     * @see ArithmeticProgression::getTypeDescription()
     */
    public function testGetTypeDescription()
    {
        $typeDescription = $this->getProgressionMock()->getTypeDescription();

        $this->assertInternalType('string', $typeDescription);
        $this->assertNotEmpty($typeDescription);
    }

    /**
     * Unit-test for method getDifference():
     * - method returns the result of subtraction.
     *
     * @see ArithmeticProgression::getDifference()
     */
    public function testGetDifference()
    {
        $progression = $this->getProgressionMock();

        $method = new \ReflectionMethod(ArithmeticProgression::class, 'getDifference');
        $method->setAccessible(true);

        $this->assertEquals(1, $method->invoke($progression, 2, 3));
        $this->assertEquals(3.25, $method->invoke($progression, 7, 10.25));
        $this->assertEquals(-1, $method->invoke($progression, 3, 2));
        $this->assertEquals(15, $method->invoke($progression, 0, 15));
    }

    /**
     * Returns mock of ArithmeticProgression.
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|ArithmeticProgression
     */
    protected function getProgressionMock()
    {
        return $this->getMockBuilder(ArithmeticProgression::class)->setMethods(['__construct'])
            ->disableOriginalConstructor()->getMock();
    }
}