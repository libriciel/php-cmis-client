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

use Dkd\PhpCmis\DataObjects\PropertyDateTime;
use Dkd\PhpCmis\Test\Unit\DataProviderCollectionTrait;

/**
 * Class PropertyDateTimeTest
 */
class PropertyDateTimeTest extends \PHPUnit\Framework\TestCase
{
    use DataProviderCollectionTrait;

    /**
     * @var PropertyDateTime
     */
    protected $propertyDateTime;

    protected function setUp(): void
    {
        $this->propertyDateTime = new PropertyDateTime('testId');
    }

    public function testSetValuesSetsProperty()
    {
        $values = [new \DateTime()];
        $this->propertyDateTime->setValues($values);
        $this->assertAttributeSame($values, 'values', $this->propertyDateTime);
    }

    public function testSetValuesThrowsExceptionIfInvalidValuesGiven()
    {
        $this->expectException(
            '\\Dkd\\PhpCmis\\Exception\\CmisInvalidArgumentException'
        );
        $this->expectExceptionMessage('Argument of type "string" given but argument of type "DateTime" was expected.');
        $this->expectExceptionCode(1413440336);
        $this->propertyDateTime->setValues(['now']);
    }

    public function testSetValueSetsValuesProperty()
    {
        $date = new \DateTime();
        $this->propertyDateTime->setValue($date);
        $this->assertAttributeSame([$date], 'values', $this->propertyDateTime);
    }

    public function testSetValueThrowsExceptionIfInvalidValueGiven()
    {
        $this->expectException(
            '\\Dkd\\PhpCmis\\Exception\\CmisInvalidArgumentException'
        );
        $this->expectExceptionMessage('Argument of type "string" given but argument of type "DateTime" was expected.');
        $this->expectExceptionCode(1413440336);
        $this->propertyDateTime->setValue('now');
    }
}
