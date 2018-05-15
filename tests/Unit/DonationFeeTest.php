<?php

namespace Tests\Unit;

use App\DonationFee;
use ClassesWithParents\D;
use Mockery\Exception;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DonationFeeTest extends TestCase
{
    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */
    public function testCommissionAmountGetter()
    {
        // Etant donné une donation de 3700 et commission de 30%
        $donationFees = new DonationFee(3700, 30);

        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 1110
        $expected = 1110;
        $this->assertEquals($expected, $actual);
    }

    public function testGetAmountCollected()
    {
        // Etant donné une donation de 3700 et commission de 30%
        $donationFees = new DonationFee(3700, 30);

        // Lorsque qu'on appel la méthode getAmountCollected()
        $actual = $donationFees->getAmountCollected();

        // Alors  le montant perçu par le porteur du projet est 2590
        $expected = 2590;
        $this->assertEquals($expected, $actual);
    }

    public function testExeptionSup30(){
        $this->expectException(Exception::class);
        new DonationFee(3700, 31);
    }

    public function testExeptionInf0(){
        $this->expectException(Exception::class);
        new DonationFee(3700, -2);
    }

    public function testEntierPositif(){
        $this->expectException(Exception::class);
        new DonationFee(250.2,10);

    }

    public function testEntierPositifInf100() {
        $this->expectException(Exception::class);
        new DonationFee(99,10);
    }

    public function test​GetFixedAndCommissionFeeAmount()
    {
        // Etant donné une donation de 3700, la commission de 30% et les frais fixe à 50
        $donationFees = new DonationFee(3700, 30);

        // Lorsque qu'on appel la méthode ​getFixedAndCommissionFeeAmount()
        $actual = $donationFees->​getFixedAndCommissionFeeAmount();

        // Alors la Valeur de la commission et des frais fixe doivent être de 1160
        $expected = 1110+50;
        $this->assertEquals($expected, $actual);
    }
}
