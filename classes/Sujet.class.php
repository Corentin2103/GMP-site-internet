<?php
class Sujet{

	private $sujet_file;
	private $titre;
	private $id_sujet;

	/**
	 * @return mixed
	 */
	public function getSujetFile() {
		return $this->sujet_file;
	}

	/**
	 * @param mixed $sujet_file
	 */
	public function setSujetFile($sujet_file) {
		$this->sujet_file = $sujet_file;
	}

	/**
	 * @return mixed
	 */
	public function getTitre() {
		return $this->titre;
	}

	/**
	 * @param mixed $titre
	 */
	public function setTitre($titre) {
		$this->titre = $titre;
	}

	/**
	 * @return mixed
	 */
	public function getIdSujet() {
		return $this->id_sujet;
	}

	/**
	 * @param mixed $id_sujet
	 */
	public function setIdSujet($id_sujet) {
		$this->id_sujet = $id_sujet;
	}

	public function __construct($valeurs=array()){
		if (!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($sujets){
		foreach ($sujets as $attributs=>$valeurs){
			switch($attributs){
				case 'id_sujet': $this->setIdSujet($valeurs);break;
				case 'titre': $this->setTitre($valeurs);break;
				case 'sujet_file': $this->setSujetFile($valeurs);break;


			}
		}
	}
}
?>