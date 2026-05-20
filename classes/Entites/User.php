<?php

require_once "../config/db.ph";

abstract class user{
   protected $db;

   public function __construct()
       {
       $this->db=DB::getConnection;
     
       }
   public function getById($id){

      $sql=" Select* from user where id=?";
      $stmt=$this->db->prepare($sql);
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC );

   }   

}