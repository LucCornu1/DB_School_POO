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
		<link rel="stylesheet" type="text/css" href="../CSS/LUCAS_style.CSS">
		<link rel="shortcut icon" type="image/x-icon" href="">
		<script type="text/javascript" src="../JS/createElement_API.js">
			
		</script>
		<title>
			<?php
			$titre = "POO - PHP";
			echo $titre;
			?>
		</title>

		<style type="text/css">
			table, th, td{
				border: 1px solid white;
				color: white;
				margin-left: 36%
			}
			table#jolie td:hover{
				color: orange;
				font-weight: bolder;
				cursor: cell;
			}
			table{
				border-collapse: collapse;
			}
			table.centre{
				margin: auto;
			}
			table.centre td{
				text-align: center;
			}
			table#jolie th{
				background: black;
				color: orange;
				padding: 5px;
			}
			table#jolie tr:first-child{
				background: #130f40;
			}
			table#jolie tr:nth-child(2n){
				background: #1B1464;
			}
			table#jolie tr:nth-child(2n+3){
				background: #130f40;
			}
			table tr:only-child{
				background: red;
			}
		</style>
	</head>

	<body>
		<h1 id="middle">Insertion Etudiant</h1>

		<div class="container">
		<form id="form" name="form" action="#" method="get">
		<!--La méthode get renvoie les informations dans l'url de la page ouverte, l'action possède l'adresse de la page à ouvrir.-->

			<input type=hidden name="hidden" id="hidden" value="Bonjour"/>
			<!--Un input caché contenant la valeur "Bonjour" pour pouvoir commencer à 1 lors de la récupération des informations..-->

			<fieldset id="Infos" class="fieldsetCat">
				<legend class="fieldsetLegend">Informations Principales</legend>

				<script type="text/javascript">
					let infos = document.getElementById("Infos");

					let label = initLabel("nom", "Nom de l'Etudiant : ");
					infos.appendChild(label);

					quickInputText(infos, "nom", "nom", "Nom de l'Etudiant", "[A-Za-z]{2,}", 0, 30, 1);

					createBreakline(infos, 2);

					label = initLabel("prenom", "Prenom de l'Etudiant : ");
					infos.appendChild(label);

					quickInputText(infos, "prenom", "prenom", "Prenom de l'Etudiant", "[A-Za-z]{2,}", 0, 30, 1);

					createBreakline(infos, 1);
				</script>

				<br>
			</fieldset>
			<!--Le fieldset permet de regrouper divers éléments du formulaire et d'y associer une légende.-->

			<br>

			<fieldset class="fieldsetCat" id="fieldset0">
				<legend class="fieldsetLegend">Validation</legend>
					<label for="submit" class="cLabel">Valider : </label><input class="btn" type="submit" name="submit" id="submit" value="Valider" onClick="changePage()"/><br>
					<!--Réception de l'information de soumission du contenu du formulaire dans un input de type submit et d'id submit. A envoyé dans une page traitement formulaire.-->
			</fieldset>
		</form>
		</div>

		<hr>
		<br>

		<?php
			if(isset($_GET['nom']) && isset($_GET['prenom']))
			{
				$connexion = connect_bd();

				$C = new managerEtudiant($connexion);

				$E = new Etudiant;

				$tab = array(
					"Nom" => $_GET['nom'],
					"Prenom" => $_GET['prenom']
					);

				$E->hydrate($tab);

				$stmt = $C->selectEtudiant($E);

				if(isset($stmt))
				{
					$C->afficheEtudiant($stmt);
				}
			}
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