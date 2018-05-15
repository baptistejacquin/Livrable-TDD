<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


use Mockery\Exception;

class DonationFee
{

    private $donation;
    private $commissionPercentage;
    protected const PRICEFIX = 50;

    public function __construct($donation, $commissionPercentage)
    {
        if ($commissionPercentage < 0 || $commissionPercentage > 30){
            throw new Exception('abuse pas avec la comm');
        }elseif (is_int($donation)=== false||$donation< 100){
            throw new Exception('abuse pas avec la donation');
        }
        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;
    }

    public function getCommissionAmount()
    {
        $donation = $this->donation;
        $commition = $this->commissionPercentage;
        $result = $donation * $commition / 100;

        return $result;
    }

    public function getAmountCollected()
    {
        $donation = $this->donation;
        $commition = $this->commissionPercentage;
        $resultCommition = $donation * $commition / 100;
        $result = $donation - $resultCommition;

        return $result;
    }

    public function ​getFixedAndCommissionFeeAmount(){
        $priceFix = self::PRICEFIX;
        $donation = $this->donation;
        $commition = $this->commissionPercentage;
        $resultCommition = $donation * $commition / 100;
        $result = $resultCommition +$priceFix;
        return $result;
    }
}