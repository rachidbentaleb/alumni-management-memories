<?php
session_start();
$sessionId=$_SESSION["nom"]->id;
if (!$_SESSION["nom"]){
    header("location:connexion.php");
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profilestyle.css">
    <title>Accueil- Coupains Avant</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="profile.php "><img src="images/ofpptlogo.svg" alt="" /></a>
        </div>
        <nav>
            <ul>
                <li><a href="#"><img src="images/home-02.svg" alt=""></a></li>
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

            <div class="searchbar">
                <form action="">
                    <input type="text" placeholder="Search">
                    <img src="images/search.svg" alt="">
                </form>
            </div>

            <h1>
                Welcome 
                <?php                 
                    if ($_SESSION["nom"])
                    { echo $_SESSION["nom"]->nom;
                    }?>
            </h1>

            <div class="souvenir-field">
                <div class="photo-profil">
                <?php
                    if ($_SESSION["nom"])
                        { echo $_SESSION["nom"]->photoprofil;
                        }
                ?>
                </div>
                <div class="field">
                    <div class="textarea">
                        <textarea name="commentaire" id="commentaire" placeholder="What do you want to say"></textarea>
                    </div>
                    <div class="actions">
                        <ul>
                            <li><img src="images/image-02.svg" alt="">Photo</li>
                            <li><img src="images/video-01.svg" alt="">Video</li>
                            <li><img src="images/calendar-03.svg" alt="">Evenement</li>
                        </ul>
                    </div>
                </div>
            </div>


            <?php
            include("connexionBD.php");
            $affichage=$connexion->query("SELECT * FROM souvenirs 
                                    INNER JOIN laureat 
                                    ON souvenirs.id_laureat = laureat.id 
                                    ORDER BY date_souvenir  DESC")->fetchAll(PDO::FETCH_ASSOC);
            foreach($affichage as $row){
            ?>
            <div class="souvenir-shares">
                    <div class="profile-souvenir-shares">
                        <div class="img-profile">
                        <img src="data:image/svg+xml;base64,<?php echo base64_encode($row['photoprofil']); ?>" alt="photoprofil">
                        </div>
                        <div class="namedate">
                            <h6><?php echo $row["nom"]." ".$row["prenom"] ?></h6>
                            <p><?php echo $row["date_souvenir"] ?></p>
                        </div>
                    </div>
                    <div class="text">
                    <p><?php echo $row["commetaire_souvenir"] ?></p>
                    </div>
                    <div class="publication-img">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['photo_souvenir']); ?>" alt="Souvenir Image">
                    </div>
                    <div class="brakeline"></div>
                    <div class="reactions">
                        <ul>
                            <li><img src="images/thumbs-up.svg" alt="">Like</li>
                            <li><img src="images/comment-01.svg" alt="">comment</li>
                            <li><img src="images/share-05.svg" alt="">share</li>
                        </ul>
                    </div>
            </div>
            <?php
            }
            ?>

        </div>
        
        <div class="right-side">
            <div class="top-side">
                <div class="background">
                    <img src="images/background.svg" alt="">
                </div>
                <div class="profil-img-right-side">
                    <?php
                        if ($_SESSION["nom"])
                            { echo $_SESSION["nom"]->photoprofil;
                            }
                    ?>
                </div>
                <div class="name">
                    <h3>         
                        <?php                 
                    if ($_SESSION["nom"])
                    { echo $_SESSION["nom"]->nom." ".$_SESSION["nom"]->prenom;
                    }?>
                    </h3>
                    <p>
                    <?php                 
                    if ($_SESSION["nom"])
                    { echo $_SESSION["nom"]->fonction;
                    }?>
                    </p>
                </div>
                <div class="editprofil-btn">
                    <div class="bluebutton">
                        <button><a href="editprofile.php?id=<?php echo $sessionId ?>">Edit profil<img src="images/user-edit-01.svg" alt=""></a></button>
                    </div>
                </div>
            </div>

        <div class="breakline"></div>


        <div class="bottom-side">
            <h4>Add to your feed</h4>
            <?php
            $affichage2 = $connexion->query("SELECT * FROM laureat WHERE id <> $sessionId LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
            foreach($affichage2 as $row){
        ?>
            <div class="addprofil">
                <div class="img-addprofil">
                <img src="data:image/svg+xml;base64,<?php echo base64_encode($row['photoprofil']); ?>" alt="photo de profil ">
                </div>
                <div class="small-description-profil">
                    <h6><?php echo $row["nom"]." ".$row["prenom"] ?></h6>
                    <p><?php echo $row["fonction"] ?></p>
                    <p class="follow">Follow +</p>
                </div>
            </div>
            <?php 
            }
        ?>
            <h5>See all recommandations ></h5>
        </div>

        </div>
    </section>
</body>
</html>