<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Chat</title>
		<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link href="bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="bootstrap/jumbotron.css" rel="stylesheet">
		<link href="bootstrap/style.css" rel="stylesheet">
		<script src="bootstrap/assets/js/ie-emulation-modes-warning.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Chat rapide</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<?php if(!isset($_SESSION['pseudo'])) { ?>
					<form class="navbar-form navbar-right" id="form_pseudo">
						<div class="form-group">
							<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" class="form-control">
						</div>
						<button type="submit" class="btn btn-success">
							Valider pseudo
						</button>
					</form>
					<?php } else { echo "<h3><p class='navbar-form navbar-right' style='color: #5CB85C'> Bienvenue ".$_SESSION['pseudo']."</p></h3>"; }?>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1>
					Bienvenue sur Chat facile !
				</h1>
				<p>
					Envie de parler sans que vous soyez espionnés ? C'est enfin possible ! Créez vos channels de discussions et invitez y les participants.
				</p>
				<p>
					Les messages seront automatiquement supprimés.
				</p>

			</div>
		</div>
		<?php if(isset($_SESSION['pseudo'])) { ?>
		<div class="container">

		<!-- Ligne liens ajout/joindre -->

		<div class="row">
		<form id="creer_salle">
		<div class="col-md-offset-4 col-md-3">
		<input type="text" class="form-control" name="nom" placeholder="Nom de la salle">
		</div>
		<div class="col-md-2">
		<input type="text" class="form-control" name="mdp" placeholder="Passe (facultatif)">
		</div>
		<div class="col-md-3">
		<button type="submit" class="btn btn-success">Créer</button>
		</div>
		</form>
		</div>

		<div class="row">
		<form id="rejoindre_salle">
		<div class="col-md-offset-4 col-md-3">
		<input type="text" class="form-control" name="code" placeholder="Code de la salle : #CT{num}">
		</div>
		<div class="col-md-2">
		<input type="text" class="form-control" name="mdp" placeholder="Passe (facultatif)">
		</div>
		<div class="col-md-3">
		<button type="submit" class="btn btn-warning">Rejoindre</button>
		</div>
		</form>
		</div>



		<div class="row">
			<div class="col-md-2">
				<h2>Liste des utilisateurs</h2>
				<p id="liste_salle">

				</p>
			</div>
			<div class="col-md-10">

				<div class="row">
					<section class="col-md-12 well">
						<legend>Salle de discussion : 
							<span id="titre_salle">
								Non chosie 
							</span>
						</legend>
						<fieldset id="chat" >


						</fieldset>
						<label for="textarea">Votre message :</label>
						<form id="text_chat">
							<textarea id="textarea" name="com" class="form-control" rows="4" placeholder="Entrez votre message"></textarea>

							<button class="btn btn-primary" type="submit">Envoyer le message</button>
						</form>
					</section>
				</div>
			</div>

		</div>

		<hr>

			<footer>
				<p>&copy; 2017 Company, Inc.</p>
			</footer>
		</div> 
		<?php } ?>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
		<script src="js.js"></script>
	</body>
</html>
