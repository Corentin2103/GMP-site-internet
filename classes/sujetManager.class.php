<?php

class sujetManager{

	private $dbo;

	public function __construct($db){
		$this->db = $db;
	}

	public function add($sujet){
		$requete = $this->db->prepare('INSERT INTO SUJET(titre,sujet_file) VALUES(:titre,:sujet_file)');

	$requete->bindValues(':sujet_file',$sujet->getSujet_File());
	$requete->bindValues(':titre',$sujet->getTitre());

	return $requete->execute();
	}
}