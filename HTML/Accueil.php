<!DOCTYPE html> <!-- Ceci est un modèle de base, penser à faire une copie avant de faire des modifications -->
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="icon" href="">
		<link rel="stylesheet" type="text/css" href="../CSS/ExamenBlanc_2019.CSS">
		<link rel="shortcut icon" type="image/x-icon" href="">
		<script type="text/javascript" src="">
			
		</script>
		<title>
			Cours de web
		</title>
	</head>

	<body>
		<header>
			<!-- Insérer un logo, informations principales -->
		</header>

		<div>
		<h1>Index</h1>

		<h3>Veuillez sélectionner la page de votre choix</h3>

		<script type="text/javascript">
			var table_Lien = ["PHP/Etudiant.php"];

			function over(X)
			//Fonction qui permet de concatener une "URL"
			{
				let chaine = "../";
				chaine += document.getElementById('pages').value;
				X.href = chaine;
			}

			document.write("<select name='pages' id='pages'> <option value='PHP/Etudiant.php'>Affichage Etudiant</option> </select>");
		</script>

		<br>
		<br>

		<a href="HTML/JS_DOM_ExamenBlanc_2019.html" onmouseover="over(this)">Lien vers la page sélectionnée</a>

		<br>
		<br>
		</div>

		<footer>
			<em> Mentions légales, Copyright, Contact et liens </em>
			<ul>
				<li>
					CORNU Luc
				</li>
				<li>
					<a href="mailto:luc.cornu@hotmail.fr" target="blank" title="Pour m'envoyer un mail"> luc.cornu@hotmail.fr </a>
				</li>
			</ul>
		</footer>
	</body>
</html>