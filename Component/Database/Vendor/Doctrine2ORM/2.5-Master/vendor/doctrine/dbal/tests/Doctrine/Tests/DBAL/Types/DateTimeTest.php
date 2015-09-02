<?php

namespace Doctrine\Tests\DBAL\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\Tests\DBAL\Mocks\MockPlatform;

require_once __DIR__.'/../../TestInit.php';

class DateTimeTest extends \Doctrine\Tests\DbalTestCase
{

    protected
        $_platform,
        $_type;

    public function testDateTimeConvertsToDatabaseValue()
    {

        $date = new \DateTime('1985-09-01 10:10:10');

        $expected = $date->format($this->_platform->getDateTimeTzFormatString());
        $actual = $this->_type->convertToDatabaseValue($date, $this->_platform);

        $this->assertEquals($expected, $actual);
    }

    public function testDateTimeConvertsToPHPValue()
    {

        // Birthday of jwage and also birthday of Doctrine. Send him a present ;)
        $date = $this->_type->convertToPHPValue('1985-09-01 00:00:00', $this->_platform);
        $this->assertInstanceOf('DateTime', $date);
        $this->assertEquals('1985-09-01 00:00:00', $date->format('Y-m-d H:i:s'));
    }

    public function testInvalidDateTimeFormatConversion()
    {

        $this->setExpectedException('Doctrine\DBAL\Types\ConversionException');
        $this->_type->convertToPHPValue('abcdefg', $this->_platform);
    }

    public function testNullConversion()
    {

        $this->assertNull($this->_type->convertToPHPValue(null, $this->_platform));
    }

    public function testConvertDateTimeToPHPValue()
    {

        $date = new \DateTime("now");
        $this->assertSame($date, $this->_type->convertToPHPValue($date, $this->_platform));
    }

    public function testConvertsNonMatchingFormatToPhpValueWithParser()
    {

        $date = '1985/09/01 10:10:10.12345';

        $actual = $this->_type->convertToPHPValue($date, $this->_platform);

        $this->assertEquals('1985-09-01 10:10:10', $actual->format('Y-m-d H:i:s'));
    }

    protected function setUp()
    {

        $this->_platform = new MockPlatform();
        $this->_type = Type::getType('datetime');
    }
}
