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

use Dkd\PhpCmis\DataObjects\PropertyString;
use Dkd\PhpCmis\Test\Unit\DataProviderCollectionTrait;

/**
 * Class PropertyStringTest
 */
class PropertyStringTest extends \PHPUnit\Framework\TestCase
{
    use DataProviderCollectionTrait;

    /**
     * @var PropertyString
     */
    protected $subjectUnderTest;

    public function setUp()
    {
        $this->subjectUnderTest = new PropertyString('testId');
    }

    /**
     * @dataProvider stringCastDataProvider
     * @param string $expected
     * @param mixed $value
     */
    public function testSetValuesSetsProperty($expected, $value)
    {
        if ($value === null) {
            $expected = null;
        }

        $values = ['foo', $value, null];
        if (!is_string($value) && $value !== null) {
            $this->expectException(
                '\\Dkd\\PhpCmis\\Exception\\CmisInvalidArgumentException'
            );
            $this->expectExceptionMessage('Argument of type "' . \gettype($value) . '" given but argument of type "string" was expected.');
            $this->expectExceptionCode(1413440336);
        }
        $this->subjectUnderTest->setValues($values);
        $this->assertAttributeSame(['foo', $expected, null], 'values', $this->subjectUnderTest);
    }

    /**
     * @dataProvider stringCastDataProvider
     * @param string $expected
     * @param mixed $value
     */
    public function testSetValueSetsValuesProperty($expected, $value)
    {
        if ($value === null) {
            $expected = null;
        }

        if (!is_string($value) && $value !== null) {
            $this->expectException(
                '\\Dkd\\PhpCmis\\Exception\\CmisInvalidArgumentException'
            );
            $this->expectExceptionMessage('Argument of type "' . \gettype($value) . '" given but argument of type "string" was expected.');
            $this->expectExceptionCode(1413440336);
        }
        $this->subjectUnderTest->setValue($value);
        $this->assertAttributeSame([$expected], 'values', $this->subjectUnderTest);
    }
}
