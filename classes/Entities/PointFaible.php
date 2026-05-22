<?php

class PointFaible
{
    public function __construct(
        private int $id,
        private int $userId,
        private int $competenceId
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getCompetenceId(): int
    {
        return $this->competenceId;
    }
}