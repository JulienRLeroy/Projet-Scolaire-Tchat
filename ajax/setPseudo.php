<?php 
session_start(); 

extract($_POST);
	if(!empty($pseudo))
	{
		$_SESSION['pseudo'] = $pseudo;
		echo "<h3><p style='color: #5CB85C'> Bienvenue ".$pseudo."</p></h3>";
	}
	else
	{
		echo "erreur";
	}

?>