<?php
 namespace TaxesClass;

 require_once(__DIR__.'/../interface/calculateAmountInterface.php');

use CalculateAmountInterface;

 class Ireland implements CalculateAmountInterface{

    public function calculateAmount(array $amounts): float
    {
        $count = count($amounts);
        $sum = array_sum($amounts);
        
        return $sum/$count;
    }
 }