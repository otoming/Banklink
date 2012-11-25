<?php

namespace Banklink\Protocol;

use Banklink\Protocol\Solo;
use Banklink\Response\PaymentResponse;

/**
 * @author Roman Marintsenko <inoryy@gmail.com>
 * @since  25.11.2012
 */
class SoloTest extends \PHPUnit_Framework_TestCase
{
    private $solo;

    public function setUp()
    {
        $this->solo = new Solo(
            '10274580',
            'WBTGlRKU57bHOnH6Ey0W4TFrsV9PDAiu',
            'http://www.google.com',
            null,
            null,
            'md5'
        );
    }

    public function testPreparePaymentRequest()
    {
        $expectedRequestData = array(
            'SOLOPMT_VERSION' => '0003',
            'SOLOPMT_STAMP' => 1,
            'SOLOPMT_RCV_ID' => '10274580',
            'SOLOPMT_LANGUAGE' => 3,
            'SOLOPMT_AMOUNT' => '100',
            'SOLOPMT_REF' => 13,
            'SOLOPMT_DATE' => 'EXPRESS',
            'SOLOPMT_MSG' => 'Test payment',
            'SOLOPMT_RETURN' => 'http://www.google.com',
            'SOLOPMT_CANCEL' => 'http://www.google.com',
            'SOLOPMT_REJECT' => 'http://www.google.com',
            'SOLOPMT_MAC' => 'A53DD635463AE22E7827D7C6A5BC133C',
            'SOLOPMT_CONFIRM' => 'YES',
            'SOLOPMT_KEYVERS' => '0001',
            'SOLOPMT_CUR' => 'EUR',
        );

        $request = $this->solo->preparePaymentRequestData(1, 100, 'Test payment', 'ISO-8859-1', 'ENG', 'EUR');

        $this->assertEquals($expectedRequestData, $request);
    }
}