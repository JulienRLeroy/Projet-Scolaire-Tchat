<?php 
session_start(); 

extract($_POST);
	 $login = 'kess';
	 $mdp='MDP';
$DB=new PDO("mysql:host=localhost;dbname=chat",$login,$mdp);

$nom = htmlentities($DB->quote($nom));
$pass = htmlentities($DB->quote($pass));

$req = $DB->query("SELECT nom FROM salles WHERE nom=$nom") or die(print_r($DB->errorInfo(), true));
if($tab=$req->fetch())
{
	echo "erreur";
}
else
{
	$creer = $DB->query("insert into salles set nom=$nom, mdp=$pass");
	$select = $DB->query("SELECT id, nom FROM salles WHERE nom=$nom");
	$tab=$select->fetch();
	
	$_SESSION['salle'] = $tab['id'];
	$_SESSION['last_id_message'] = 0;
	echo $tab['id'].".".$tab['nom'];
}
