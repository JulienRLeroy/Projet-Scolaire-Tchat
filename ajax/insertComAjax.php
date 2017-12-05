<?php 
session_start(); 

extract($_POST);
	 $login = 'kess';
	 $mdp='MDP';
$DB=new PDO("mysql:host=localhost;dbname=chat",$login,$mdp);
$message = htmlentities($DB->quote($com));
$pseudo = htmlentities($DB->quote($_SESSION['pseudo']));
$id_salle = htmlentities($DB->quote($_SESSION['salle']));
if(!empty($com))
{
	$DB->query("INSERT INTO messages_salle SET message=$message, pseudo=$pseudo, id_salle=$id_salle");

		include("rafraichirComAjax.php");
}
else
	echo "erreur";
		
	


?>