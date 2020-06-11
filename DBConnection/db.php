<?php

$dbName = "Student";
$password = "STUDENT";
$servername = "localhost:1521/xe";

$conn = oci_connect($dbName,$password,$servername);

if(!$conn)
{
    die("Opss..! probleme la conexiune, verifica fisierul DBConnection/db.php");
}