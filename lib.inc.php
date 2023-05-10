<?php
session_start();
require 'secretxyz123.php';
function connexionBD(){
$mabd=null;

try{
    $mabd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=mmiple;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE); 
    $mabd->query('SET NAMES utf8;');
} catch (PD0Exception $e){
    echo '<p>Erreur : '.$e->getMessage().'</p>';
    die(); 
}


return $mabd;

}

function deconnexionBD($mabd){
    $mabd=null;
}


function afficherjeux($mabd){
    $req = "SELECT * FROM mmiple_jeux;";
        $resultat = $mabd->query($req);

        foreach($resultat as $unjeu){
             echo ' Nom du jeu : '.$unjeu['jeu_nom'];
             echo '<p>Nombre de joueurs : mini '.$unjeu['jeu_nb_joueurs_mini'].' / maxi'.$unjeu['jeu_nb_joueurs_maxi'].'</p><br>';
             echo '<img src="'.$unjeu['jeu_photo1'].'"';}
             echo '<div><a class="ajoutpanier?jeu_id='.$unjeu['jeu_code'].'" href="ajout_panier.php">Ajouter au panier</a></div>'."\n";
}


// fonction qui récupère les informations sur un jeu

// et les retourne ou bien retourne null si le jeu n'existe pas

function recuperer_jeu($co, $id) {

    $req="SELECT * FROM mmiple_jeux WHERE jeu_code=".$id; // créer la requête  //echo '<p>'.$req.'</p>'."\n"; 
    
    try {
    
    $resultat=$co->query($req); // exécuter la requête
    
    } catch (PDOException $e) {
    
    print "Erreur : ".$e->getMessage().'<br />'; die();
    
    }
    
    // compter le nombre de résultats
    
    $lignes_resultat=$resultat->rowCount();
    
    if ($lignes_resultat>0) { // y a-t-il des résultats ?
    
    // oui : pour chaque résultat : afficher
    
    return $resultat->fetch(PDO::FETCH_ASSOC);
    
    } else {
    
    // non, on renvoie la valeur "null"
    
    return null;
    
    }
    }

function panier_total_jeux() {
if(isset($_SESSION['panier'])) {
    $panier = $_SESSION['panier'];
    $total = 0;
    foreach($panier as $jeu) {
        $total += $jeu['quantite'];
    }
    return $total;
} else {
    return 0;
}
}

function afficherPanier($co) {

    if (empty($_SESSION['panier'])) { // la panier est vide ?
    
    $tablePanier='<p class="erreur">Désolé, votre panier est vide !</p>'; } else { // sinon le panier contient quelque chose
    
    $tablePanier='<table id="tablePanier">'."\n";
    
    $tablePanier.='<thead><th>Jeu</th> <th>Prix</th>'."\n";
    
    $tablePanier.='<th>Quantité</th><th>Total</th></thead>'."\n";

    foreach($_SESSION['panier'] as $produits) {
        $nom = $produits['nom'];
        $prix = $produits['prix'];
        $quantite = $produits['quantite'];
    
        $tablePanier .= '<tr>';
        $tablePanier .= '<td> '.$nom.'</td>';
        $tablePanier .= '<td> '.$prix.'</td>';;
        $tablePanier .= '<td> '.$quantite.'</td>';;
        $tablePanier .= '<td> '.$prix * $quantite. '</td>';;;
        $tablePanier .= '</tr>';

        
    }
    
    $tablePanier.='</table>'."\n";
     
     
    }
    
    return $tablePanier;
    
}


   

