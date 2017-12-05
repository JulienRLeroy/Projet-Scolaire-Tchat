<?php 
session_start();


	 $login = 'kess';
	 $mdp='MDP';
$DB=new PDO("mysql:host=localhost;dbname=chat",$login,$mdp);


$req = $DB->query("SELECT pseudo,message FROM messages_salle WHERE id_salle=".$_SESSION['salle']." ORDER BY messages_salle.id DESC");
$cpt =$_SESSION['last_id_message'];
while($tab=$req->fetch())
{
	$cpt++;
	echo "</br>".$tab[0]." dit : ".$tab[1];
}

$_SESSION['last_id_message'] = $cpt;


?>