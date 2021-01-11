<?php

class sujetManager{

	private $dbo;

	public function __construct($db){
		$this->db = $db;
	}

	public function add($sujet){
		$requete = $this->db->prepare('INSERT INTO SUJET(sujet_file) VALUES(:sujet_file)');

	$requete->bindValues(':sujet_file',$sujet->getSujet_File());

	return $requete->execute();
	}
}