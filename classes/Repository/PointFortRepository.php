<?php

require_once "../classes/Entities/PointFort.php";

class PointFortRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

 }   