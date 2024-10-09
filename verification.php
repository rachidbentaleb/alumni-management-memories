<?php
if ($_POST["email"]==$_SESSION["nom"]->email && $_POST["mdp"]==$_SESSION["nom"]->motdepasse){
    session_start();
    $_SESSION["login_connecte"]=$_POST["nom"];
    header("location:profile.php");
}