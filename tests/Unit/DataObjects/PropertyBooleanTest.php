<?php
namespace Dkd\PhpCmis\Test\Unit\DataObjects;

/*
 * This file is part of php-cmis-lib.
 *
 * (c) Sascha Egerer <sascha.egerer@dkd.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Dkd\PhpCmis\DataObjects\PropertyBoolean;
use Dkd\PhpCmis\Test\Unit\DataProviderCollectionTrait;

/**
 * Class PropertyBooleanTest
 */
class PropertyBooleanTest extends \PHPUnit\Framework\TestCase
{
    use DataProviderCollectionTrait;

    /**
     * @var PropertyBoolean
     */
    protected $propertyBoolean;

    protected function setUp(): void
    {
        $this->propertyBoolean = new PropertyBoolean('testId');
    }

    /**
     * @dataProvider booleanCastDataProvider
     * @param boolean $expected
     * @param mixed $value
     */
    public function testSetValuesSetsProperty($expected, $value)
    {
        if ($value === null) {
            $expected = $value;
        }
        if (!is_bool($value) && $value !== null) {
            $this->expectException(
                '\\Dkd\\PhpCmis\\Exception\\CmisInvalidArgumentException'
            );
            $this->expectExceptionMessage('Argument of type "' . \gettype($value) . '" given but argument of type "boolean" was expected.');
            $this->expectExceptionCode(1413440336);
        }
        $values = [true, $value];
        $this->propertyBoolean->setValues($values);
        $this->assertAttributeSame([true, $expected], 'values', $this->propertyBoolean);
    }

    /**
     * @dataProvider booleanCastDataProvider
     * @param boolean $expected
     * @param mixed $value
     */
    public function testSetValueSetsValuesProperty($expected, $value)
    {
        if ($value === null) {
            $expected = $value;
        }
        if (!is_bool($value) && $value !== null) {
            $this->expectException(
                '\\Dkd\\PhpCmis\\Exception\\CmisInvalidArgumentException'
            );
            $this->expectExceptionMessage('Argument of type "' . \gettype($value) . '" given but argument of type "boolean" was expected.');
            $this->expectExceptionCode(1413440336);
        }
        $this->propertyBoolean->setValue($value);
        $this->assertAttributeSame([$expected], 'values', $this->propertyBoolean);
    }
}
