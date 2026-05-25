<?php

require_once "../classes/Entities/Review.php";

class ReviewRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}