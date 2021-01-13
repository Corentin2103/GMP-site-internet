<?php

class sujetManager{

	private $dbo;

	public function __construct($db){
		$this->db = $db;
	}

	public function add($sujet){
		$requete = $this->db->prepare('INSERT INTO SUJET(id_sujet,titre,sujet_file) VALUES(:id_sujet,:titre,:sujet_file)');

	$requete->bindValue(':sujet_file',$sujet->getSujetFile());
	$requete->bindValue(':titre',$sujet->getTitre());
	$requete->bindValue(':id_sujet',$sujet->getIdSujet());

	return $requete->execute();
	}

	public function getAllSujets(){
		$listeSujets = array();

		$sql = 'select * FROM sujet';

		$requete = $this->db->prepare($sql);
		$requete->execute();

		while ($sujet = $requete->fetch(PDO::FETCH_OBJ))
			$listeSujets[] = new Sujet($sujet);

		$requete->closeCursor();
		return $listeSujets;
	}

	public function existe($id){
		$sql = "select * from sujet where id_sujet='$id'";

		$requete = $this->db->prepare($sql);
		$requete->execute();

		while($sujet = $requete->fetch(PDO::FETCH_ASSOC)){
			return true;
		}
		return false;
	}
}