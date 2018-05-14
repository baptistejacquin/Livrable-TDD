<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


class DonationFee
{

    private $donation;
    private $commissionPercentage;

    public function __construct($donation, $commissionPercentage)
    {
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
}