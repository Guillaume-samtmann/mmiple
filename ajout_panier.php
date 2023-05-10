<?php
require('lib.inc.php');

if(!empty($_SESSION['prenom_client'])){

    $idjeux = $_GET['jeu_id'];

    $co=connexionBD();
    $info = recuperer_jeu($co, $idjeux);

    if(!empty($_SESSION['panier'][$idjeux])) {
        $_SESSION['panier'][$idjeux]['quantite']++;

    } else {
        $_SESSION['panier'][$idjeux]=[ 'nom' => $info['jeu_nom'], 'prix'=>$info['jeu_prix'], 'quantite' =>1 ];
    }
    header('location: jeux.php');


}else{
    header('location: connexion.php');
}
?>