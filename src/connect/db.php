<?php

namespace Connect;
use PDO;
use PDOException;

class DB{

    protected function connect(){
        try{
            $db=new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'],$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD'],[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                return $db;
        }
        catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
        
    }

}