<?php
include("connexionBD.php");
session_start();
if (!isset($_SESSION["nom"])) {
    header("location:connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bonjour <?php echo htmlspecialchars($_SESSION["nom"]->nom); ?></h1>
    <form action="essaye.php" method="post" enctype="multipart/form-data">
        <label for="pdp">Photo de profil</label>
        <input type="file" name="pdp" id="pdp" accept="image/*">
        <input type="submit" value="Changer">
        <br><br>
        <img width="120px" src="data:image/svg+xml;base64,<?php echo base64_encode($_SESSION["nom"]->photoprofil); ?>" alt="Photo de profil">
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_FILES['pdp']) && $_FILES['pdp']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['pdp']['tmp_name'];
        $fileName = $_FILES['pdp']['name'];
        $fileSize = $_FILES['pdp']['size'];
        $fileType = $_FILES['pdp']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'jpeg', 'svg', 'png');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = 'C:\xampp\candidat';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Lire le contenu du fichier et l'encoder en base64
                $imageContent = file_get_contents($dest_path);
                $base64Image = base64_encode($imageContent);

                // Mise à jour de la base de données
                $modifier = $connexion->prepare("UPDATE laureat SET photoprofil=:pdp WHERE id=:id");
                $modifier->bindParam(':pdp', $base64Image);
                $modifier->bindParam(':id', $_SESSION["id"]); // Assurez-vous que l'ID est stocké dans la session
                $modifier->execute();
                
                // Mettre à jour la session avec la nouvelle photo de profil
                $_SESSION["nom"]->photoprofil = $base64Image;
                
                echo 'Le fichier a été téléchargé avec succès.';
            } else {
                echo 'Il y a eu un problème lors du téléchargement du fichier.';
            }
        } else {
            echo 'Type de fichier non autorisé.';
        }
    } else {
        echo 'Erreur lors du téléchargement du fichier.';
    }
}
?>
