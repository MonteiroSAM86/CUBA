<?php
/* Database connection settings */
$host = 'localhost'; //81.88.52.85
$user = 'root'; //co3wzjcg_HUGO
$pass = ''; //Insta360!
$db = 'accounts'; //co3wzjcg_accounts
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
