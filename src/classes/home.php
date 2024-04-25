<?php
namespace App;
class Home {

    public function  index(){

        var_dump($_ENV['DB_PASSWORD']);
        echo 'eee';
        return 'sss';

    }
}