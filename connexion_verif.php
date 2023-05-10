<?php
require 'lib.inc.php';
$email=$_POST['email'];
$mdp=$_POST['mdp'];
$mabd=connexionBD();
$req='SELECT * FROM mmiple_clients WHERE client_email LIKE  "'.$email.'"';//echo '<p>'.$req.'</p>';
// on lance la requête
$resultat=$mabd->query($req);
// on calcule le nombre de lignes renvoyées
$lignes_resultat=$resultat->rowCount();
if ($lignes_resultat>0) { // y a-t-il des résultats ?
// oui : pour chaque résultat : afficher
$ligne=$resultat->fetch(PDO::FETCH_ASSOC);
if (password_verify($mdp , $ligne['client_mdp'])) {
echo 'OK... :)</p>';
$_SESSION['prenom_client']=$ligne['client_prenom'];
$_SESSION['numero_client']=$ligne['client_code'];
header('location:jeux.php');
} else {
$_SESSION['erreur']='<h1 class="erreur">Le mot de passe saisi est incorrect.</h1>';
header('location:connexion.php');
}
}

deconnexionBD($mabd);



?>