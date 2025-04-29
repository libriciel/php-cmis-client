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

use Dkd\PhpCmis\DataObjects\PolicyType;
use Dkd\PhpCmis\DataObjects\PolicyTypeDefinition;
use Dkd\PhpCmis\Definitions\PolicyTypeDefinitionInterface;
use PHPUnit_Framework_MockObject_MockObject;

/**
 * Class PolicyTypeTest
 */
class PolicyTypeTest extends \Dkd\PhpCmis\Test\Unit\PhpCmisTestCase
{
    public function testConstructorSetsSession()
    {
        /**
         * @var \Dkd\PhpCmis\SessionInterface|\PHPUnit\Framework\MockObject\MockObject $sessionMock
         */
        $sessionMock = $this->getMockBuilder('\\Dkd\\PhpCmis\\SessionInterface')->getMockForAbstractClass();

        $policyTypeDefinition = new PolicyTypeDefinition('typeId');
        $errorReportingLevel = error_reporting(E_ALL & ~E_USER_NOTICE);
        $policyType = new PolicyType($sessionMock, $policyTypeDefinition);
        error_reporting($errorReportingLevel);

        $this->assertAttributeSame($sessionMock, 'session', $policyType);
    }

    public function testConstructorCallsPopulateMethod()
    {
        /**
         * @var \Dkd\PhpCmis\SessionInterface|\PHPUnit\Framework\MockObject\MockObject $sessionMock
         */
        $sessionMock = $this->getMockBuilder('\\Dkd\\PhpCmis\\SessionInterface')->getMockForAbstractClass();

        $policyTypeDefinition = new PolicyTypeDefinition('typeId');

        /**
         * @var PolicyType|\PHPUnit\Framework\MockObject\MockObject $policyType
         */
        $policyType = $this->getMockBuilder('\\Dkd\\PhpCmis\\DataObjects\\PolicyType')->setMethods(
            ['populate']
        )->disableOriginalConstructor()->getMock();
        $policyType->expects($this->once())->method('populate')->with(
            $policyTypeDefinition
        );
        $policyType->__construct($sessionMock, $policyTypeDefinition);
    }
}
