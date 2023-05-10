<header>
    <img src="img/logo_mmiple.png" alt="mmiple logo" id="logo" />
    <nav>
        <a href="index.php">Accueil</a> -
        <a href="jeux.php">Jeux</a> -
        <a href="contact.php">Contact</a>
    </nav>
    <div id="connexion">
    <a href="panier.php">
    <span class="uk-badge" id="panier_jeux">

    <?php
    require('lib.inc.php');
    $total=panier_total_jeux();
    ?>

    <?php 
    echo panier_total_jeux(); 
    ?>



</span>
<img src="img/cadie.png" id="panier" />
</a>
<?php 
    if(!empty($_SESSION['prenom_client'])){
        echo 'Bonjour '.$_SESSION['prenom_client'];
        echo '<a href= "deconnexion.php"> / Deconnexion</a>';
    } else {
        echo '<a href= "connexion.php">Connexion</a>';
        
        echo '<a href= "inscription.php"> / Inscription</a>';
    }
?>


&nbsp;

    </div>
</header>
