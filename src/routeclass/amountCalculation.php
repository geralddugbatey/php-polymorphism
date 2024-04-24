<?php

namespace RouteClass;

require_once(__DIR__.'/../taxesclass/finland.php');
require_once(__DIR__.'/../taxesclass/ireland.php');
require_once(__DIR__.'/../polyclass/polyamountclass.php');
require_once(__DIR__.'/../classes/error.php');

use Exception;
use PolyAmount;
use RouterNotFoundException;




class AmountCalculation{

    public function route(){
      try{
        if($_GET['method']){
          if($_GET['method']==='finland'||'iceland'){
  
            $class = 'TaxesClass\\' . ucfirst($_GET['method']);
            
            
            $calculationInstance = new PolyAmount();
  
            $calculationInstance->calculate(new $class());
  
          }
        }
        else{
          throw new RouterNotFoundException();
        }
      }
      catch(Exception $e){
        echo $e->getMessage();
    }
  
    
    }

}