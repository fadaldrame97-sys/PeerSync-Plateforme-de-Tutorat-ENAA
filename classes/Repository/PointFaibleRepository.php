<?php
require_once "../classes/Entities/PointFaible.php";

class PointFaibleRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}