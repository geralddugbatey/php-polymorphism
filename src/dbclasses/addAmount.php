<?php
namespace DBClasses;
require_once(__DIR__ . '/../connect/db.php');

use Connect\DB;
use Exception;
use RouterNotFoundException;

class AddAmount extends DB{

    private float | array  $amount_values;
    private $amount ;
    
    public function add(){
        try{
        $jsonData= file_get_contents('php://input');
        $data = json_decode($jsonData,true);
   
        if($data['amount']){
            $this->amount_values=$data['amount'];
            $query='INSERT INTO amount_records(amount) VALUES (:amount)';
            if(is_array($data['amount'])){

                $stmt= parent::connect()->prepare($query);
                $stmt->bindParam('amount',$this->amount);

                foreach($this->amount_values as $amount_loop){
                    $this->amount= $amount_loop;
                    $stmt->execute();
                }
                $this->send(parent::connect()->lastInsertId());
            }
            else{
                $stmt= parent::connect()->prepare($query);
                $stmt->bindParam('amount',$this->amount_values);

                $stmt->execute();

                $this->send(parent::connect()->lastInsertId());
            }
        }
        else{
            throw new RouterNotFoundException();
        }

    }
    catch(  Exception $e){
    
        return $e->getMessage();
    }
        // echo $data->amount;
   


    }

    private function send($id){
        echo json_encode($id);
    }



}