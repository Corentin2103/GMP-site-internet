<?php
class Sujet{

	private $sujet_file;
	private $titre;



	public function __construct($valeurs=array()){
		if (!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($sujets){
		foreach ($sujets as $attributs=>$valeurs){
			switch($valeurs){
				case 'sujet_file' : $this->setSujet_File($valeurs);break;
				case 'titre' : $this->setTitre($valeurs);break;
			}
		}
	}

	public function setSujet_File($id){
		$this->sujet_file=$id;
	}

	public function getSujet_File(){
		return $this->sujet_file;
	}

	public function getTitre() {
		return $this->titre;
	}
	public function setTitre($titre) {
		$this->titre = $titre;
	}
}
?>
