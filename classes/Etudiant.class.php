<?php
class Personne{
  private $id
	private $etu_nom;
	private $etu_prenom;
	private $annee;

	public function __construct($valeurs = array()){
		if (!empty ($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($donnees){
		foreach ($donnees as $attribut => $value) {
			switch ($attribut) {
				case 'id': $this->setEtudiantId($value);break;
				case 'etu_nom': $this->setEtudiantNom($value);break;
				case 'etu_prenom': $this->setEtudiantPrenom($value);break;
        case 'annee': $this->setEtudiantAnnee($value);break;
			}
		}
	}

	public function getEtudiantId(){
			return $this->id;
	}
	public function setEtudiantId($id){
			$this->id = $id;
	}

  public function getEtudiantNom(){
			return $this->etu_nom;
	}
	public function setEtudiantNom($etu_nom){
			$this->etu_nom = $etu_nom;
	}

  public function getEtudiantPrenom(){
			return $this->etu_prenom;
	}
	public function setEtudiantPrenom($etu_prenom){
			$this->etu_prenom = $etu_prenom;
	}

  public function getEtudiantAnnee(){
			return $this->annee;
	}
	public function setEtudiantAnnee($annee){
			$this->annee = $annee;
	}
}
