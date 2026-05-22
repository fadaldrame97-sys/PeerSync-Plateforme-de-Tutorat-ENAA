<?php

session_start();

require_once "../config/db.php";

require_once "../classes/Entities/PointFort.php";

require_once "../classes/Repository/PointFortRepository.php";
require_once "../classes/Repository/CompetenceRepository.php";

$db = DB::getConnection();

$pointFortRepo = new PointFortRepository($db);

$competenceRepo = new CompetenceRepository($db);

$competences = $competenceRepo->findAll();

$message = "";