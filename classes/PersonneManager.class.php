<?php
class PersonneManager{
	private $db;

  public function __construct($db){
        $this->db = $db;
  }
	public function add($personne){

	    $requete = $this->db->prepare(
	      'INSERT INTO personne (per_mail,per_mdp) VALUES (:per_mail, :per_mdp);');
	      $requete->bindValue(':per_mail',$personne->getPersonneEmail());
	      $requete->bindValue(':per_mdp',$personne->getPersonneMotDePasse());
	      $retour=$requete->execute();
	      $num = $this->db->lastInsertID();
	      return $num;
	    }
			public function RecupPersNum($per_mail){

			      $sql = 'select per_num FROM personne where per_mail="'.$per_mail.'"';
			      $requete = $this->db->prepare($sql);
			      $requete->execute();
			      return $requete->fetch();
			    }
	public function getIdPersonne($email, $mot_de_passe){
	$sql = "SELECT per_num FROM personne
					WHERE per_mail = '".$email."' and per_mdp = '".$mot_de_passe."' ";

	$requete = $this->db->prepare($sql);
	$requete->execute();
	return $requete->fetch();
}

public function EstPresent($per_mail,$per_mdp){
		$sql = 'select per_mail,per_mdp FROM personne WHERE per_mail= "'.$per_mail.'"';
		$requete = $this->db->prepare($sql);
		$requete->execute();

		while ($personne = $requete->fetch(PDO::FETCH_ASSOC)){
			if($per_mail == $personne['per_mail'] && $per_mdp ==$personne['per_mdp']){
				return true;

				$requete->closeCursor();
			}
		}
		return false;
		$requete->closeCursor();

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
