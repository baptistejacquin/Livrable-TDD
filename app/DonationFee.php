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
        $commitionAmount = $donation * $commition / 100;

        return $commitionAmount;
    }

    public function getAmountCollected()
    {
        $donation = $this->donation;
        $commition = $this->commissionPercentage;
        $resultCommition = ($donation * $commition / 100) + self::PRICEFIX;
        if ($resultCommition >500){
            $resultCommition =500;
        }
        $amountCollected = $donation - $resultCommition;

        return $amountCollected;
    }

    public function ​getFixedAndCommissionFeeAmount(){
        $priceFix = self::PRICEFIX;
        $donation = $this->donation;
        $commition = $this->commissionPercentage;
        $resultCommition = $donation * $commition / 100;
        $result = $resultCommition +$priceFix;

        if ($result >500){
            $result =500;
        }
        return $result;
    }

    public function getSummary(){
        $tab = array(
            "donation"=>$this->donation,
            "fixedFee"=>self::PRICEFIX,
            "commission"=>$this->getCommissionAmount(),
            "fixedAndCommission"=>$this->​getFixedAndCommissionFeeAmount(),
            "amountCollected"=>$this->getAmountCollected()
        );
        return $tab;
    }
}