<?php
require_once("objEtudiant.php");

class managerEtudiant
{

	//Membres privés
	private $db;

	//Fonctions membres
	//Le hydrate (Ou le constructeur)
	public function __construct($_db)
	{
		$this->setDb($_db);
	}

	//Le destructeur
	public function __destruct()
	{
		echo "<script>console.log(\"Destruction de l'élement\")</script>";
	}

	//Les getters
	public function getDb()
	{
		return $this->db;
	}

	//Les setters
	public function setDb($conn)
	{
		$this->db = $conn;
	}

	public function __toString()
	{
		return "Database=".$this->getDb();
	}

	public function selectEtudiant(Etudiant $E)
	{
		$req = "SELECT libelle_Civilite, nom_Etudiant, prenom_Etudiant, email_Etudiant FROM Etudiant E, Civilite C WHERE nom_Etudiant = :NOM AND prenom_Etudiant = :PRENOM AND E.id_Civilite = C.id_Civilite";

		//Envoie de la requête à la base
		try
		{
			$stmt = $this->db->prepare($req);

			$stmt->bindValue(":NOM", $E->getNom(), PDO::PARAM_STR);
			$stmt->bindValue(":PRENOM", $E->getPrenom(), PDO::PARAM_STR);

			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $error)
		{
			echo $error->getMessage();
			return NULL;
		}
	}

	public function afficheEtudiant($stmt)
	{
		if($stmt->rowCount()>0)
		{
			foreach($stmt as $row)
			{
				echo "<table><th>CIVILITE</th><th>NOM</th><th>PRENOM</th><th>EMAIL</th>";
				echo "<tr><td>".$row['libelle_Civilite']."</td><td>".$row['nom_Etudiant']."</td><td>".$row['prenom_Etudiant']."</td><td>".$row['email_Etudiant']."</td></tr>";
				echo "</table>";
			}
		}else{
			echo "La requête ne retourne rien";
		}
	}
}
?>