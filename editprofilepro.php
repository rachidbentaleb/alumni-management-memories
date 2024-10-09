<?php
include("connexionBD.php");
session_start();
$idmod = $_GET["id"];
if (!$_SESSION["nom"]){
    header("location:connexion.php");
    
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $promotion = $_POST["promotion"];
    $filiere = $_POST["filiere"];
    $etablissement = $_POST["etablissement"];
    $fonction = $_POST["fonction"];
    $employeur = $_POST["employeur"];

    $modifier = $connexion->prepare("UPDATE laureat SET promotion=:pro, filiere=:fil, etablissement=:eta, fonction=:fonc, employeur=:emp WHERE id=:id");
    $modifier->bindParam(':pro', $promotion);
    $modifier->bindParam(':fil', $filiere);
    $modifier->bindParam(':eta', $etablissement);
    $modifier->bindParam(':fonc', $fonction);
    $modifier->bindParam(':emp', $employeur);
    $modifier->bindParam(':id', $idmod);
    $modifier->execute();
}

$list = $connexion->prepare("SELECT * FROM laureat WHERE id=:id");
$list->bindParam(':id', $idmod);
$list->execute();
$row = $list->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editprofilepro.css">
    <title>Editer- Coupains Avant</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="profile.php "><img src="images/ofpptlogo.svg" alt="" /></a>
        </div>
        <nav>
            <ul>
                <li><a href="profile.php"><img src="images/home-02.svg" alt=""></a></li>
                <li><a href="#"><img src="images/user-multiple.svg" alt=""></a></li>
                <li><a href="#"><img src="images/message-01.svg" alt=""></a></li>
            </ul>
        </nav>
        <div class="logout">
            <a href="deconnexion.php"><img src="images/logout-04.svg" alt=""></a>
        </div>
    </header>

    <section>
        <div class="left-side">
            <h2>Profil & Paramètres</h2>
            <div class="parametres">
                <a href="editprofile.php?id=<?php echo $idmod ?>"><img src="images/input-vide.svg" alt=""><p>Info personnelles</p></a>
                <a href="editprofilepro.php?id=<?php echo $idmod ?>"><img src="images/input.svg" alt=""><p  style="color:#323232;">Info professionnelles</p></a>
                <a href="#"><img src="images/input-vide.svg" alt=""><p>Préférences</p></a>
                <a href="#"><img src="images/input-vide.svg" alt=""><p>Profils sociaux</p></a>
            </div>
        </div>
        <div class="right-side">
            <div class="title">
                <h2>Informations professionnelles</h2>
                <p>Vous pouvez mettre à jour votre photo de profil et vos informations personnelles ici.</p>
            </div>
            <div class="photo-profile">
                <img width="120px" src="data:image/svg+xml;base64,<?php echo base64_encode($row->photoprofil); ?>" alt="photoprofil">
                <form method="editprofilepro.php" action="post" enctype="multipart/form-data">
                    <input type="file" name="pdp" id="pdp">
                </form>
            </div>
            <div id="firstbreakline"></div>
            <form action="editprofilepro.php?id=<?php echo $idmod ?>" method="post">
                <div class="field">
                    <h4>Promotion</h4>
                    <input type="text" name="promotion" id="promotion" value="<?php echo $row->promotion ?>">
                </div>
                <div class="breakline"></div>
                <div class="field">
                    <h4>Filiere</h4>
                    <input type="text" name="filiere" id="filiere" value="<?php echo $row->filiere ?>">
                </div>
                <div class="breakline"></div>
                <div class="field">
                    <h4>Etablissement</h4>
                    <input type="text" name="etablissement" id="etablissement" value="<?php echo $row->etablissement ?>">
                </div>
                <div class="breakline"></div>
                <div class="field">
                    <h4>Fonction</h4>
                    <input type="text" name="fonction" id="fonction" value="<?php echo $row->fonction ?>">
                </div>
                <div class="breakline"></div>
                <div class="field">
                    <h4>Employeur</h4>
                    <input type="text" name="employeur" id="employeur" value="<?php echo $row->employeur ?>">
                </div>
                <div class="breakline"></div>
                <div class="twobtns">
                    <input type="reset" value="Cancel">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
    </section>
    <script>
    </script>

</body>