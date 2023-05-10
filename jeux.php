<?php require 'debut_html.inc.php'; ?>

<?php require 'menu_html.inc.php'; ?>
<?php

?>
        <div id="contenu">
            <h1>Découvez les jeux MMiple</h1>
            <?php // print_r($_SESSION); ?>

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
                // Préparation de la requete
                $requete = "SELECT * FROM mmiple_jeux;";
                $jeux = $db->query($requete);

                //debug 
                // var_dump($jeux);

                ?>
                <ul>
                    <?php
                         //affichage
                        foreach($jeux as $unjeu) {
                        echo '<article class="jeu">';
                        echo '<h3>'.$unjeu['jeu_nom'].'</h3>';
                        echo '<p>Editeur : </strong>'.$unjeu['jeu_editeur'].'</p>';
                        echo '<p>Nombre de joueurs mini '.$unjeu['jeu_nb_joueurs_mini'].' / maxi '.$unjeu['jeu_nb_joueurs_maxi'].'</p>';
                        echo '<p>Durée d\'une partie : '.$unjeu['jeu_duree_partie'].'mn</p>';
                        echo '<img src="'.$unjeu['jeu_photo1'].'" alt="photo jeu">';
                        echo '<div><a href="ajout_panier.php?jeu_id='.$unjeu['jeu_code'].'">Ajouter au panier</a></div>'."\n";
                        echo '</article>';
                        

                }
                    ?>
                </ul>
        </div>

<?php require 'fin_html.inc.php'; ?>
