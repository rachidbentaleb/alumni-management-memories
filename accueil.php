<?php 
  include("connexionBD.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="accueilpage.css">
    <title>Coupains Avant</title>
  </head>
  <body>
    <header>
      <div class="logo">
        <a href="accueil.php"><img src="images/ofpptlogo.svg" alt="" /></a>
      </div>

      <div class="navbar">
        <ul>
          <li>
            <span><img src="images/home-05.svg" alt="" /></span
            ><a href="accueil.php">Accueil</a>
          </li>
          <li>
            <span><img src="images/avis.svg" alt="" /></span
            ><a href="#Lesavis">Avis</a>
          </li>
          <li>
            <span><img src="images/chatting-01.svg" alt="" /></span
            ><a href="contact.php">Contact</a>
          </li>
        </ul>
      </div>

      <div class="inscription">
        <button class="inscrire-btn"><a style="  color: #323232;
  text-decoration: none;" href="s'inscrire.php">S'inscrire</a></button>
        <button class="connecter-btn"><a href="connexion.php"style="color:#0a66c2;
        text-decoration: none;">Se connecter</a></button>
      </div>
    </header>

    <section>
      <div class="left-side">
        <div class="bigtitle">
          <h1>
            <span>Bienvenue,</span><br />
            sur copains avant
          </h1>
          <p>
            La plateforme dédiée aux lauréats d’ OFPPT. <br />
            Que vous souhaitiez renouer avec d'anciens camarades,<br />
            élargir votre réseau professionnel ou trouver de nouvelles
            opportunités,<br />
            notre communauté est là pour vous.
          </p>
        </div>
        <div class="ourclients">
          <?php 
            $count = $connexion->query("SELECT COUNT(id) AS NOMBRE_DES_LAUREATS FROM laureat")->fetch(PDO::FETCH_ASSOC);
            $nombre_des_laureats = $count['NOMBRE_DES_LAUREATS'];
          ?>
          <h3>Rejoignez Nos <?php echo $nombre_des_laureats ?> Lauréats Inscrits</h3>
          <p>
            Découvrez pourquoi des milliers de diplômés d’ OFPPT nous ont déjà
            rejoints <br />
            pour renforcer leur réseau, partager des opportunités et se
            reconnecter avec <br />
            leurs anciens camarades.
          </p>
          <img src="images/clients.svg" alt="" />
        </div>
        <div class="application">
          <h3>Téléchargez Notre Application Mobile</h3>
          <div class="appstore-googleplay">
            <img src="images/googleplay.svg" alt="" />
            <img src="images/appstore.svg" alt="" />
          </div>
        </div>
      </div>
      <div class="right-side">
        <img src="images/img-principal.svg" alt="" />
      </div>
    </section>

    <article id="Lesavis">
      <h1>Paroles de <span>Diplômés</span></h1>
      <div class="avis">
        <?php
          $affichage=$connexion->query("SELECT * FROM avis 
          INNER JOIN laureat 
          ON avis.id_laureat = laureat.id 
          ORDER BY date_avis DESC 
          LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
          foreach($affichage as $row){
            ?>
            <div class="breakline"></div>
        <p>
          <?php echo $row["avis"]?>
        </p>
        <h6><?php echo $row["nom"]." , Promotion ". $row["promotion"] ?></h6>
        <img src="data:image/svg+xml;base64,<?php echo base64_encode($row['photoprofil']); ?>" alt="photo de profil ">
        <?php 
          }
          ?>
      </div>
    </article>

    <footer>
      <div class="top-side">
        <div class="left-side">
          <img src="images/ofpptlogowhite.svg" alt="" />
          <p>
            Connectez-vous, collaborez, et réussissez avec notre réseau exclusif
            <br />
            pour les diplômés d'OFPPT.
          </p>
          <div class="navbar">
            <ul>
              <li><a href="accueil.php">Accueil</a></li>
              <li><a href="#Lesavis">Avis</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="right-side">
          <h3>Notre Application Mobile</h3>
          <img src="images/googleplaywhite.svg" alt="" /><br />
          <img src="images/appstorewhite.svg" alt="" />
        </div>
      </div>
      <div class="breakline"></div>
      <div class="bottom-side">
        <div class="left-side">
          <p>&copy; 2024 Coupains Avant. Tous droits réservés.</p>
        </div>
        <div class="right-side">
          <a href="https://www.facebook.com/rachid.bentaleb.545" target="_blank"><img src="images/facebook-02.svg" alt="" /></a>
          <a href="https://www.instagram.com/rashedbentaleb_" target="_blank"><img src="images/instagram.svg" alt="" /></a>
          <a href="https://twitter.com/RASHEDBENTALEB_" target="_blank"><img src="images/twitter.svg" alt="" /></a>
        </div>
      </div>
    </footer>
  </body>
</html>
