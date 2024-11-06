<?php
$host="localhost";
$username="root";
$password="";
$dbname="coupainsavant";

try {
    $connexion=  new PDO("mysql:host=$host;port=3307;dbname=$dbname",$username,$password);
}catch(PDOException $e){
    die("impossible de se connecter a la base $dbname ".$e->getMessage());
}