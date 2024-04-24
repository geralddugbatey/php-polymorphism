<?php
namespace DBClasses;
require_once(__DIR__.'/../connect/db.php');
use Connect\DB;
use Exception;
use PDO;

class GetAmount extends DB{

    public function get(){
        try{
            $query='SELECT * FROM amount_records';
            $stmt= parent::connect()->prepare($query);
            $stmt->execute();
           $results =$stmt->fetchAll(PDO::FETCH_ASSOC);
    
        
            echo json_encode($results);
        }

        catch(  Exception $e){
    
            return $e->getMessage();
        }

    }

}