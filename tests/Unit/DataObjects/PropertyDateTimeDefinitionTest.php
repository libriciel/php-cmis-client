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

use Dkd\PhpCmis\DataObjects\PropertyDateTimeDefinition;
use Dkd\PhpCmis\Enum\DateTimeResolution;

/**
 * Class PropertyDateTimeDefinitionTest
 */
class PropertyDateTimeDefinitionTest extends \Dkd\PhpCmis\Test\Unit\PhpCmisTestCase
{
    /**
     * @var PropertyDateTimeDefinition
     */
    protected $propertyDateTimeDefinition;

    protected function setUp(): void
    {
        $this->propertyDateTimeDefinition = new PropertyDateTimeDefinition('testId');
    }

    public function testAssertIsInstanceOfAbstractPropertyDefinition()
    {
        $this->assertInstanceOf(
            '\\Dkd\\PhpCmis\\DataObjects\\AbstractPropertyDefinition',
            $this->propertyDateTimeDefinition
        );
    }

    public function testSetPrecisionSetsProperty()
    {
        $dateTimeResolution = DateTimeResolution::cast(DateTimeResolution::YEAR);
        $this->propertyDateTimeDefinition->setDateTimeResolution($dateTimeResolution);
        $this->assertAttributeSame($dateTimeResolution, 'dateTimeResolution', $this->propertyDateTimeDefinition);
    }

    /**
     * @depends testSetPrecisionSetsProperty
     */
    public function testGetPrecisionReturnsPropertyValue()
    {
        $dateTimeResolution = DateTimeResolution::cast(DateTimeResolution::YEAR);
        $this->propertyDateTimeDefinition->setDateTimeResolution($dateTimeResolution);
        $this->assertSame($dateTimeResolution, $this->propertyDateTimeDefinition->getDateTimeResolution());
    }
}
