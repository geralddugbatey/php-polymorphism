<?php
namespace TaxesClass;
require_once(__DIR__.'/../interface/calculateAmountInterface.php');

use CalculateAmountInterface;

class Finland implements CalculateAmountInterface{
  
    public function calculateAmount(array $amounts): float
    {
        $min = min($amounts);
        $max = max($amounts);
        return $max - $min;
      
    }
}