<?php 
session_start(); 

extract($_POST);
	 $login = 'kess';
	 $mdp='MDP';
$DB=new PDO("mysql:host=localhost;dbname=chat",$login,$mdp);

$nom = htmlentities($DB->quote($code));
$pass = htmlentities($DB->quote($pass));
$user = htmlentities($DB->quote($_SESSION['pseudo']));

$req = $DB->query("SELECT id,nom FROM salles WHERE nom=$nom AND mdp=$pass") or die(print_r($DB->errorInfo(), true));
if($tab=$req->fetch())
{
	$ip = md5($_SERVER["REMOTE_ADDR"]);
	$check_usr = $DB->query("SELECT pseudo from utilisateurs_salles where pseudo=$user");
	if($find=$check_usr->fetch())
		$DB->query("DELETE FROM utilisateurs_salles WHERE ip='$ip'");
		$check_usr = $DB->query("INSERT INTO utilisateurs_salles SET pseudo=$user, ip='$ip', id_salle='".$tab['id']."'");
		$_SESSION['salle'] = $tab['id'];
		echo $tab['id'].".".$tab['nom'];
	
}
else
	echo "erreur";
