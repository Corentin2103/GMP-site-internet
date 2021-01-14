<?php
class Personne{
	private $per_num;
	private $per_mail;
	private $per_mdp;

	public function __construct($valeurs = array()){
		if (!empty ($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($donnees){
		foreach ($donnees as $attribut => $value) {
			switch ($attribut) {
				case 'per_num': $this->setPersonneId($value);break;
				case 'per_mail': $this->setPersonneEmail($value);break;
				case 'per_mdp': $this->setPersonneMotDePasse($value);break;
			}
		}
	}

	public function getPersonneId(){
			return $this->per_num;
	}
	public function setPersonneId($value){
			$this->per_num = $value;
	}

	public function getPersonneEmail(){
			return $this->per_mail;
	}
	public function setPersonneEmail($value){
			$this->per_mail = $value;
	}

	public function getPersonneMotDePasse(){
			return $this->per_mdp;
	}
	public function setPersonneMotDePasse($value){
			$this->per_mdp = $value;
	}
}
