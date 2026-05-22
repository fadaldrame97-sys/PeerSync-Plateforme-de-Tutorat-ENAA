<?php

require_once "../classes/Entities/Competence.php";

class CompetenceRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}    