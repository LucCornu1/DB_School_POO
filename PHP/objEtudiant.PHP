<?php
class Etudiant{

	//Membres privés
	private $id;
	private $nom;
	private $prenom;
	private $email;
	private $DDN;

	//Fonctions membres
	//Le hydrate (Ou le constructeur)
	public function hydrate(array $donnees)
	{
		foreach($donnees as $key => $value)
		{
			//On récupère le nom du setter correspondant à l'attribut.
			$method = "set".ucfirst($key);

			//Si le setter correspondant existe.
			if(method_exists($this, $method))
			{
				//On appelle le setter.
				$this->$method($value);
			}
		}
	}

	//Le destructeur
	public function __destruct()
	{
		echo "<script>console.log(\"Destruction de l'élement\")</script>";
	}

	//Les getters
	public function getId()
	{
		return $this->id;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function getPrenom()
	{
		return $this->prenom;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getDDN()
	{
		return $this->DDN;
	}

	//Les setters
	public function setId($num)
	{
		$this->id = $num;
	}

	public function setNom($name)
	{
		$this->nom = $name;
	}

	public function setPrenom($firstName)
	{
		$this->prenom = $firstName;
	}

	public function setEmail($mail)
	{
		$this->email = $mail;
	}

	public function setDDN($date)
	{
		$this->DDN = $date;
	}

	public function __toString()
	{
		return "Etudiant : id=".$this->getId().", Nom=".$this->getNom().", Prenom=".$this->getPrenom().", email=".$this->getEmail().", Date de naissance=".$this->getDDN();
	}
}
?>