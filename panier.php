
<?php require 'debut_html.inc.php'; ?>

<?php require 'menu_html.inc.php'; ?>
<?php

?>
        <div id="contenu">
            <h1>Découvez les jeux MMiple</h1>
            <?php print_r($_SESSION); ?>

<?php // ou bien

// var_dump($_SESSION); ?>
            <?php
                //connexion à la base de données
                
                

                $db = null;

                    try {

                        $db = new PDO('mysql:host=localhost;dbname=mmiple;charset=UTF8',LUTILISATEUR,LEMOTDEPASSE);
                        $db->query('SET NAMES utf8;');

                    } catch (PDOException $e) {

                        echo '<p>Erreur : ' . $e->getMessage() . '</p>';

                        die();

                        }

$co=connexionBD();

echo afficherPanier($co);

deconnexionBD($co);

                // Préparation de la requete
                $requete = "SELECT * FROM mmiple_jeux;";
                $jeux = $db->query($requete);

                //debug 
                // var_dump($jeux);

                ?>
                <ul>
                    <?php
                         //affichage
                        
                    ?>
                </ul>
        </div>

<?php require 'fin_html.inc.php'; ?>