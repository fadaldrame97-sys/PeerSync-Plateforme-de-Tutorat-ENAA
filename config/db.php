
<?php

class DB {
    private static $connection= null;

public static function getConnction (){


if(self::$connection==null){

self::$connection= new PDO("myqsl:host=localhost;dbname=peerenaa","root","");

}


} 
} 