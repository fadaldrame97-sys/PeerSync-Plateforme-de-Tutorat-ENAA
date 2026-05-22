<?php

class PointFort{
    private int $id;
    private int $userID;
    private int $competenceID;

    public function __construct(int $id,int $userID,$competenceID){
        $this->id=$id;
        $this->userID=$userID;
        $this->competenceID=$competenceID;
     
    }
    public function getID(){
        return $this->id;
    }
    public function getUserID(){
        return $this->userID;
    }
    public function getCompetenceID(){
        return $this->competenceID;
    }
}