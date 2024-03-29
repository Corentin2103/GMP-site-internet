<?php
class FormuleManager{
  private $db;

		public function __construct($db){
			$this->db = $db;
		}
    public function add($variable){
          $requete = $this->db->prepare(
          'INSERT INTO formule (Equation,LibEq,marge) VALUES (:Equation,:LibEq,:marge);');
          $requete->bindValue(':Equation',$variable->getEquation());
          $requete->bindValue(':LibEq',$variable->getLibEq());
          $requete->bindValue(':marge',$variable->getMarge());

          $retour=$requete->execute();
          $num = $this->db->lastInsertID();
          return $num;

      }
      public function getAllForm(){
        $listeFormule = array();
        $sql = 'select distinct NumEq,LibEq,Equation FROM formule';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($formule = $requete->fetch(PDO::FETCH_OBJ)){
        $listeFormule[] = new Formule($formule);
      }
      $requete->closeCursor();
      return $listeFormule;
      }


      public function getEq($num_eq){

        $sql = 'select equation FROM formule where numEq="'.$num_eq.'"';
        $requete = $this->db->prepare($sql);
        $requete->execute();

      return $requete->fetch();
      }


      public function getLibEq($num_eq){
        $sql = 'select libEq FROM formule where numEq="'.$num_eq.'"';
        $requete = $this->db->prepare($sql);
        $requete->execute();

        return $requete->fetch();
      }


      public function suppEq($num_eq){
        $sql = "DELETE FROM `formule` WHERE numEq =".$num_eq;
        $requete = $this->db->prepare($sql);
        $requete->execute();
        $requete->closeCursor();

      }
      public function updateFormule($formule){
      $sql ='UPDATE formule SET numEq=:numEq,libEq=:libEq,equation=:equation,marge=:marge where numEq= :numEq ';
      $requete = $this->db->prepare($sql);
      $requete->bindValue(':numEq',$formule->getNumEq());
      $requete->bindValue(':libEq',$formule->getLibEq());
      $requete->bindValue(':equation',$formule->getEquation());
      $requete->bindValue(':marge',$formule->getMarge());
      $retour = $requete->execute();
      $requete->closeCursor();
      return $retour;
    }

    public function getAllLib(){
      $listeLib = array();
      $sql = 'select distinct libEq FROM formule';
      $requete = $this->db->prepare($sql);
      $requete->execute();
      while ($libelle = $requete->fetch(PDO::FETCH_ASSOC)){
      $listeLib[] = $libelle;
    }
    $requete->closeCursor();
    return $listeLib;
    }

    public function getEqByLib($libEq){

      $sql = 'select equation FROM formule where libEq="'.$libEq.'"';
      $requete = $this->db->prepare($sql);
      $requete->execute();

    return $requete->fetch();
    }
    public function getMarge($num_eq){

      $sql = 'select marge FROM formule where numEq="'.$num_eq.'"';
      $requete = $this->db->prepare($sql);
      $requete->execute();

    return $requete->fetch();
    }
}
