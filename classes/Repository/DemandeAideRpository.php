<?php
declare(strict_types=1);
require_once'../Entites/DemandAide.php';
require_once'../Entites/Statut.php';

class DemandeAideRpository{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        throw new \Exception('Not implemented');
    }
}