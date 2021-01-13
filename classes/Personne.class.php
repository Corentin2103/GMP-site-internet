<?php
class Personne{
	private $id;
	private $email;
	private $mot_de_passe;

	public function __construct($valeurs = array()){
		if (!empty ($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($donnees){
		foreach ($donnees as $attribut => $value) {
			switch ($attribut) {
				case 'id': $this->setPersonneId($value);break;
				case 'email': $this->setPersonneEmail($value);break;
				case 'mot_de_passe': $this->setPersonneMotDePasse($value);break;
			}
		}
	}

	public function getPersonneId(){
			return $this->id;
	}
	public function setPersonneId($id){
			$this->id = $id;
	}

	public function getPersonneEmail(){
			return $this->email;
	}
	public function setPersonneEmail($email){
			$this->email = $email;
	}

	public function getPersonneMotDePasse(){
			return $this->mot_de_passe;
	}
	public function setPersonneMotDePasse($mot_de_passe){
			$this->mot_de_passe = $mot_de_passe;
	}
}
