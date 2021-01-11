<?php
class Sujet{

	private $texte;

	public function __construct($valeurs=array()){
		if (!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($sujets){
		foreach ($sujets as $attributs=>$valeurs){
			switch($attributs){
				case 'texte' : $this->setTexte($attributs);break;
			}
		}
	}

	public function setTexte($id){
		$this->texte=$id;
	}
}
?>