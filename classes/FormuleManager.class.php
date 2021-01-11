<?php
class FormuleManager{
  private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
    public function add($variable){
          $requete = $this->db->prepare(
          'INSERT INTO formule (Equation,LibEq) VALUES (:Equation,:LibEq);');
          $requete->bindValue(':Equation',$variable->getEquation());
          $requete->bindValue(':LibEq',$variable->getLibEq());


          $retour=$requete->execute();
          return $retour;
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


}
