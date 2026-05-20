<?php
declare(strict_types=1);
require_once "../config/db.php";

abstract class User{
   protected $db;

   public function __construct()
       {
       $this->db=DB::getConnection();
     
       }
   public function getById($id) : ?array{

      $sql=" Select* from users where id=?";
      $stmt=$this->db->prepare($sql);
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC );

   }   

}