<?php

session_start();

require_once "../config/db.php";
require_once "../classes/Repository/AdminRepository.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

if($_SESSION['role'] !== 'admin'){
    die("Accès refusé");
}