<?php

namespace Tests\Unit\Progression;

use Codeception\Test\Unit;
use TestTask\Progression\GeometricProgression;

/**
 * Unit-tests for GeometricProgression class.
 */
class GeometricProgressionTest extends Unit
{
    /**
     * Unit-test for method getTypeDescription():
     * - method returns not empty string.
     *
     * @see GeometricProgression::getTypeDescription()
     */
    public function testGetTypeDescription()
    {
        $typeDescription = $this->getProgressionMock()->getTypeDescription();

        $this->assertInternalType('string', $typeDescription);
        $this->assertNotEmpty($typeDescription);
    }

    /**
     * Unit-test for method getDifference():
     * - method returns the result of division.
     *
     * @see GeometricProgression::getDifference()
     */
    public function testGetDifference()
    {
        $progression = $this->getProgressionMock();

        $method = new \ReflectionMethod(GeometricProgression::class, 'getDifference');
        $method->setAccessible(true);

        $this->assertEquals(2, $method->invoke($progression, 2, 4));
        $this->assertEquals(0.4, $method->invoke($progression, 5, 2));
        $this->assertEquals(4, $method->invoke($progression, 8, 32));
    }

    /**
     * Returns mock of GeometricProgression.
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|GeometricProgression
     */
    protected function getProgressionMock()
    {
        return $this->getMockBuilder(GeometricProgression::class)->setMethods(['__construct'])
            ->disableOriginalConstructor()->getMock();
    }
}