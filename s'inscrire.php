<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="s'inscrire.css">
    <title>S'inscrire- Coupains Avant</title>
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
        <h1>Inscrivez-vous</h1>
        <p>pour rejoindre notre communauté</p>
        <form action="s'inscrire.php" method="POST">
          <div class="formulaire">
            <div class="form-column">
              <input type="text" name="nom" placeholder="Nom" required /><br />
              <input type="text" name="prenom" placeholder="Prenom" required /><br />
              <input type="email" name="email" placeholder="Email" required /><br />
              <input type="password" name="mdp" placeholder="Mot de passe" id="password" required /><br />
              <input type="password" name="confirmemdp" placeholder="Confirmer mot de passe" id="confpassword" required /><br />
            </div>
            <div class="form-column2">
              <input type="text" name="promotion" placeholder="Promotion" /><br />
              <input type="text" name="filiere" placeholder="Filiere" /><br />
              <input type="text" name="etablissement" placeholder="Etablissement" /><br />
              <input type="tel" name="telephone" placeholder="Telephone" /><br />
              <input type="text" name="employeur" placeholder="Employeur" /><br />
            </div>
          </div>
          <input type="submit" value="S'inscrire" id="submit-btn"/>
        </form>
        <p id="comptetext">Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous</a></p>
      </div>

      <div class="right-side">
        <img src="images/Plant.svg" alt="" />
      </div>
    </section>

    <script>
        document.getElementById("password").addEventListener("input", checkPasswords);
        document.getElementById("confpassword").addEventListener("input", checkPasswords);

        function checkPasswords() {
            let password = document.getElementById("password");
            let confpassword = document.getElementById("confpassword");

            if (password.value === confpassword.value) {
                password.style.border = "2px solid green";
                confpassword.style.border = "2px solid green";
            } else {
                password.style.border = "2px solid red";
                confpassword.style.border = "2px solid red";
            }
        }

        document.querySelector("form").addEventListener("submit", function(event) {
        let emailinput = document.getElementsByName("email")[0].value;
        let passinput = document.getElementsByName("mdp")[0].value;
        let nominput = document.getElementsByName("nom")[0].value;
        let prenominput = document.getElementsByName("prenom")[0].value;
        let promotioninput = document.getElementsByName("promotion")[0].value;
        let filiereinput = document.getElementsByName("filiere")[0].value;
        let etabinput = document.getElementsByName("etablissement")[0].value;
        let telinput = document.getElementsByName("telephone")[0].value;
        let empinput = document.getElementsByName("employeur")[0].value;
        
        if (emailinput === "" && passinput === "" && nominput === "" 
            && prenominput === "" && promotioninput === "" && filiereinput === ""
            && etabinput === "" && telinput === "" && empinput === ""
        ) {
            alert("vous n'avez rien saisi");
            event.preventDefault(); 
        }
        });
</script>
    </script>
  </body>
</html>
<?php
include("connexionBD.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $confirmemdp = $_POST["confirmemdp"];
    $promotion = $_POST["promotion"];
    $filiere = $_POST["filiere"];
    $etablissement = $_POST["etablissement"];
    $telephone = $_POST["telephone"];
    $employeur = $_POST["employeur"];

    if ($mdp === $confirmemdp) {
        $stmt = $connexion->prepare("INSERT INTO laureat (nom, prenom, email, motdepasse, telephone, promotion, filiere, etablissement, employeur) VALUES (:nom, :prenom, :email, :mdp, :telephone, :promotion, :filiere, :etablissement, :employeur)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':promotion', $promotion);
        $stmt->bindParam(':filiere', $filiere);
        $stmt->bindParam(':etablissement', $etablissement);
        $stmt->bindParam(':employeur', $employeur);
        $stmt->execute();

        header("Location: connexion.php");
        exit();
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}
?>
