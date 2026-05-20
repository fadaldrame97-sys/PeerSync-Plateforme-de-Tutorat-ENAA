<?php
declare(strict_types=1);

abstract class User {
    protected int $id;
    protected string $name;

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }
}