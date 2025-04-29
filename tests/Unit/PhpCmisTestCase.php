<?php

declare(strict_types=1);

namespace Dkd\PhpCmis\Test\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionClass;

class PhpCmisTestCase extends TestCase
{
    /**
     * @deprecated
     */
    public function assertAttributeInstanceOf(string $expectedClass, string $attributeName, $object): void
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($attributeName);
        $property->setAccessible(true);
        $value = $property->getValue($object);

        $this->assertInstanceOf($expectedClass, $value);
    }

    /**
     * @deprecated
     */
    public function assertAttributeSame($expectedValue, string $attributeName, $object): void
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($attributeName);
        $property->setAccessible(true);
        $value = $property->getValue($object);

        $this->assertSame($expectedValue, $value);
    }

    /**
     * @deprecated
     */
    public function assertAttributeEquals($expectedValue, string $attributeName, $object): void
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($attributeName);
        $property->setAccessible(true);
        $value = $property->getValue($object);

        $this->assertEquals($expectedValue, $value);
    }

    /**
     * @deprecated
     */
    public function getStaticAttribute(string $className, string $staticAttributeName)
    {
        $reflection = new ReflectionClass($className);
        $property = $reflection->getProperty($staticAttributeName);
        $property->setAccessible(true);

        return $property->getValue();
    }

    /**
     * @deprecated
     */
    public function assertAttributeEmpty(string $attributeName, $object): void
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($attributeName);
        $property->setAccessible(true);
        $value = $property->getValue($object);

        $this->assertEmpty($value, "Failed asserting that the attribute '$attributeName' is empty.");
    }

    /**
     * @deprecated
     */
    public function assertAttributeInternalType(string $expectedType, string $attributeName, $object): void
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($attributeName);
        $property->setAccessible(true);
        $value = $property->getValue($object);

        $actualType = gettype($value);
        $this->assertSame(
            $expectedType,
            $actualType,
            "Failed asserting that the attribute '$attributeName' is of type '$expectedType'. Found '$actualType' instead."
        );
    }
}
