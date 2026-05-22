<?php
declare(strict_types=1);

abstract class User {
    protected int $id;
    protected string $nom;

    public function __construct( int $id, string $nom)
    {
       $this->id=$id;
       $this->nom=$nom;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->nom;
    }

    public function setName(string $nom): void {
        $this->nom = $nom;
    }
}