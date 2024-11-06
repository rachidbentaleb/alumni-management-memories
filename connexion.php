<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion- Coupains Avant</title>
</head>
<body>
    <nav>
        <div class="logo">
          <a href="accueil.php"><img src="images/ofpptlogo.svg" alt="" /></a>
        </div>
    </nav>
    <section>
        <div class="left-side">
          <img src="images/students.svg" alt="" />
        </div>
  
        <div class="middle-part">
          <h1>Se connecter</h1>
          <p class="conx">Connexion à Votre Espace</p>
          <form action="connexion.php" method="POST">
            <input type="text"  name="email" placeholder="Email" /><br />
            <input type="password"  name="mdp" placeholder="Mot de passe" style=" margin-bottom: 40px;"/><br />
            <input type="submit" value="Se connecter">
          </form>
          <p class="comptetext">Pas encore de compte ? <a href="s'inscrire.php">Inscrivez-vous</a></p>
        </div>
        <div class="right-side">
          <img src="images/Plant.svg" alt="" />
        </div>
    </section>
    <script>
    document.querySelector("form").addEventListener("submit", function(event) {
        let emailinput = document.getElementsByName("email")[0].value;
        let passinput = document.getElementsByName("mdp")[0].value;
        
        if (emailinput === "" || passinput === "") {
            alert("vous n'avez rien saisi");
            event.preventDefault(); 
        }
    });
</script>
</body>
</html>
<?php
include("connexionBD.php");
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $email=$_POST["email"];
    $mdp=$_POST["mdp"];
    $stm=$connexion->prepare("SELECT * FROM laureat WHERE email= :e AND motdepasse= :m");
    $stm->bindParam(":e",$email);
    $stm->bindParam(":m",$mdp);
    $stm->execute();
    $record=$stm->fetchAll(PDO::FETCH_OBJ);

    if (count($record)>0){
        session_start();
        $_SESSION["nom"]=$record[0];
        header("location: verification.php");
    }
}
?>
