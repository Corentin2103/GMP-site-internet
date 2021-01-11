<?php
class Sujet{

	private $texte;
	private $titre;



	public function __construct($valeurs=array()){
		if (!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($sujets){
		foreach ($sujets as $attributs=>$valeurs){
			switch($attributs){
				case 'texte' : $this->setSujet_File($attributs);break;
				case 'titre' : $this->setTitre($attributs);break;
			}
		}
	}

	public function setSujet_File($id){
		$this->texte=$id;
	}

	public function getSujet_File(){
		return $this->texte;
	}
	
	public function getTitre() {
		return $this->titre;
	}
	public function setTitre($titre) {
		$this->titre = $titre;
	}
}
?>