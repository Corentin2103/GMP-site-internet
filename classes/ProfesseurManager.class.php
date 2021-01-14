<?php
class ProfesseurManager{
  private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
    public function add($salarie){
          $requete = $this->db->prepare(
          'INSERT INTO professeur (per_num, prof_nom,prof_prenom) VALUES (:per_num, :prof_nom, :prof_prenom);');

          $requete->bindValue(':per_num',$salarie->getPersNum());
          $requete->bindValue(':prof_nom',$salarie->getProfNom());
          $requete->bindValue(':prof_prenom',$salarie->getProfPrenom());

          $retour=$requete->execute();
          return $retour;
      }




    public function EstPresent($pers_num){
      $sql = 'select per_num FROM professeur WHERE per_num= "'.$pers_num.'"';
      $requete = $this->db->prepare($sql);
      $requete->execute();

      while ($salarie = $requete->fetch(PDO::FETCH_ASSOC)){
          if($pers_num == $salarie['per_num']){
            return true;
            $requete->closeCursor();
          }
        }
        return false;
      $requete->closeCursor();

    }

    public function RecupSalarie($pers_num){
      $recupSal = array();
      $sql = 'select sal_telprof,fon_num FROM salarie WHERE per_num= "'.$pers_num.'"';
      $requete = $this->db->prepare($sql);
      $requete->execute();
      while ($salarie = $requete->fetch(PDO::FETCH_ASSOC)){
          $recupSal[] = $salarie;
        }
        $requete->closeCursor();
        return $recupSal;
    }
    public function updateSalarie($salarie){
      $sql ='UPDATE salarie SET sal_telprof= :sal_telprof , fon_num =:fon_num where per_num= :per_num ';
      $requete = $this->db->prepare($sql);
      $requete->bindValue(':sal_telprof',$salarie->getSalTelProf());
      $requete->bindValue(':fon_num',$salarie->getFonNum());
      $requete->bindValue(':per_num',$salarie->getPersNum());
      $retour = $requete->execute();
      $requete->closeCursor();
      return $retour;
    }
}
