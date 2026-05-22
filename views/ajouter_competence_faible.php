<?php

session_start();

require_once "../config/db.php";

require_once "../classes/Entities/PointFaible.php";
require_once "../classes/Repository/PointFaibleRepository.php";
require_once "../classes/Repository/CompetenceRepository.php";

$db = DB::getConnection();