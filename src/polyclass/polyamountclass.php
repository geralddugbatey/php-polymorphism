<?php

require_once(__DIR__.'/../interface/calculateAmountInterface.php');
use Connect\DB;



class PolyAmount extends DB {

    public function calculate(CalculateAmountInterface $calculator){

        try{
            $query ='SELECT * FROM amount_records';
            $stms= parent::connect()->prepare($query);
            $stms->execute();
            $results= $stms->fetchAll(PDO::FETCH_ASSOC);
    
            $arr=[];
    
            foreach($results as $data){
                $arr[]=$data['amount'];
            }
    
             echo $calculator->calculateAmount($arr);

        }
        catch(  Exception $e){
    
            return $e->getMessage();
        }
       


    }
}