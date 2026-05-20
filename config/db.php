
<?php

class DB {
    private static $connection= null;

    public static function getConnection () :PDO{


        if(self::$connection==null){

            //crer la connection 
            self::$connection= new PDO("mysql:host=localhost;dbname=peerenaa","root","");
            //cofigurer le PDO en=n cas d'erreur
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;

    } 
} 