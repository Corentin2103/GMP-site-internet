<?php
class PersonneManager{
	private $db;

  public function __construct($db){
        $this->db = $db;
  }

	public function getIdPersonne($email, $mot_de_passe){
	$sql = "SELECT id_personne FROM personne
					WHERE email = '".$email."' and mot_de_passe = '".$mot_de_passe."' ";

	$requete = $this->db->prepare($sql);
	$requete->execute();
	return $requete->fetch();
}

	public function estEtudiant($id_personne){
		$sqlEtudiant = "SELECT id_personne, etu_nom, etu_prenom, annee FROM etudiant where id_personne =". $id_personne."" ;
		$requeteEtudiant = $this->db->prepare($sqlEtudiant);
	  $requeteEtudiant->execute();

		while ($personne = $requeteEtudiant->fetch(PDO::FETCH_ASSOC)){
		        if($id_personne == $personne['id_personne']){
		          return true;

		          $requeteEtudiant->closeCursor();
		        }
		      }
		      return false;
		      $requeteEtudiant->closeCursor();
		}

	public function estProfesseur($id_personne){
		$sqlEtudiant = "SELECT id_personne, pro_nom, pro_prenom FROM professeur where id_personne =". $id_personne."" ;
		$requeteEtudiant = $this->db->prepare($sqlEtudiant);
		$requeteEtudiant->execute();

		while ($personne = $requeteEtudiant->fetch(PDO::FETCH_ASSOC)){
						if($id_personne == $personne['id_personne']){
							return true;

							$requeteEtudiant->closeCursor();
						}
					}
					return false;
					$requeteEtudiant->closeCursor();
				}
}
