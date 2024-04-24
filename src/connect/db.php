<?php

namespace Connect;
use PDO;
use PDOException;

class DB{

    protected function connect(){
        try{
            $db=new PDO('mysql:host=db;dbname=gee','root','root',[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                return $db;
        }
        catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
        
    }

}