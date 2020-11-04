<?php
require_once("PDO_Connect/PDO_Connect.php");
require_once("objEtudiant.php");
require_once("managerEtudiant.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="icon" href="">
		<link rel="stylesheet" type="text/css" href="">
		<link rel="shortcut icon" type="image/x-icon" href="">
		<script type="text/javascript" src="../JS/JS_DOM_Formulaire.js">
			
		</script>
		<title>
			<?php
			$titre = "POO - PHP";
			echo $titre;
			?>
		</title>
	</head>

	<body>
		<h1 id="middle">Formulaire utilisateur</h1>

		<div class="form">
		<form id="form" name="form" action="#" method="get">
		<!--La méthode get renvoie les informations dans l'url de la page ouverte, l'action possède l'adresse de la page à ouvrir.-->

			<input type=hidden name="hidden" id="hidden" value="Bonjour"/>
			<!--Un input caché contenant la valeur "Bonjour" pour pouvoir commencer à 1 lors de la récupération des informations..-->

			<fieldset id="Infos">
				<legend>Informations Générales</legend>

				<script type="text/javascript">
					let infos = document.getElementById("Infos");

					let label = initLabel("nom", "Nom : ");
					infos.appendChild(label);

					let nom = initInput("text", "nom", "nom");
					nom.setAttribute("maxlength", "20");
					nom.setAttribute("size", "20");
					infos.appendChild(nom);

					createBreakline(infos, 1);

					label = initLabel("prenom", "Prenom : ");
					infos.appendChild(label);

					let prenom = initInput("text", "prenom", "prenom");
					prenom.setAttribute("maxlength", "20");
					prenom.setAttribute("size", "20");
					infos.appendChild(prenom);

					createBreakline(infos, 1);

					createSoloMail();

					label = initLabel("ville", "Ville : ");
					infos.appendChild(label);

					let ville = initInput("text", "ville", "ville");
					prenom.setAttribute("maxlength", "20");
					prenom.setAttribute("size", "20");
					infos.appendChild(ville);

					createBreakline(infos, 1);
				</script>
				<br>
			</fieldset>
			<!--Le fieldset permet de regrouper divers éléments du formulaire et d'y associer une légende.-->

			<br>

			<fieldset>
				<legend>Fin de formulaire</legend>
				<div id="BoutonsFormulaires">
					<label for="reset">Reset : </label><input class="boutonsFormulaires" type="reset" name="reset" id="reset" value="Reset"/><br>
					<!--Réception de l'information d'annulation du contenu du formulaire dans un input de type reset et d'id reset.-->
					<label for="submit">Valider : </label><input class="boutonsFormulaires" type="submit" name="submit" id="submit" value="Valider" onClick="changePage()"/><br>
					<!--Réception de l'information de soumission du contenu du formulaire dans un input de type submit et d'id submit. A envoyé dans une page traitement formulaire.-->
				</div>
				<!--Boutons pour annuler ou soumettre la saisie.-->
			</fieldset>
		</form>
		</div>

		<?php
			$connexion = connect_bd();

			$C = new managerEtudiant($connexion);

			$E = new Etudiant;

			$tab = array(
				"id" => 1,
				"Nom" => "DEMIEUX",
				"Prenom" => "Saskia",
				"Email" => "Saskia.DEMIEUX@mail.com",
				"DDN" => "02/10/1998"
			);

			$E->hydrate($tab);

			$C->req_selectAll($E);
		?>

		<br>
		<br>

		<footer>
			<div>Nous somme le :</div>
			<?php
				echo date('d/m/Y h:i:s'); /*fonction date permettant d'afficher la date (si on veut rafraichir autom : 'setInterval'*/
			?>
		</footer>

	</body>
</html>