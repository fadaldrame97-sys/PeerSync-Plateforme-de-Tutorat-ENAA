<?php

require_once "../config/db.ph";

abstract class user{
   protected $db;

   public function __construct()
     {
       $this->db=DB::getConnction;
   
     }

}