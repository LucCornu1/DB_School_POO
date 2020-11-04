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

	public function req_selectAll(Etudiant $E)
	{
		$req = "SELECT * FROM Etudiant WHERE id_Etudiant=".$E->getId();

		try
		{
			$stmt = $this->db->prepare($req);
			$stmt->execute();

			foreach($stmt as $row)
			{
				echo '<p>'.$row['id_Etudiant']." ".$row['nom_Etudiant']." ".$row['prenom_Etudiant']." ".$row['email_Etudiant']." ".$row['DDN_Etudiant'].'</p>';
			}
		}
		catch(PDOException $error)
		{
			echo $error->getMessage();
			exit();
		}
	}
}
?>