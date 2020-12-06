<?php
class VariableManager{
  private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
    public function add($variable){
          $requete = $this->db->prepare(
          'INSERT INTO variable (variable1, variable2,variable3,variable4,variable5,variable6,variable7,variable8,variable9) VALUES (:variable1, :variable2,:variable3,:variable4,:variable5,:variable6,:variable7,:variable8,:variable9);');
          $requete->bindValue(':variable1',$variable->getVar1());
          $requete->bindValue(':variable2',$variable->getVar2());
          $requete->bindValue(':variable3',$variable->getVar3());
          $requete->bindValue(':variable4',$variable->getVar4());
          $requete->bindValue(':variable5',$variable->getVar5());
          $requete->bindValue(':variable6',$variable->getVar6());
          $requete->bindValue(':variable7',$variable->getVar7());
          $requete->bindValue(':variable8',$variable->getVar8());
          $requete->bindValue(':variable9',$variable->getVar9());

          $retour=$requete->execute();
          return $retour;
      }

      function lire_csv($nom_fichier,$separateur){
        $donnee = array();
        $result = array();
        $fichier = fopen($nom_fichier,'r');
        $i = 0;
        $taille=filesize($nom_fichier)+1;

        while($donnee = fgetcsv($fichier,$taille,$separateur)){
          $result[$i]=$donnee;
          $i++;
        }
        fclose($fichier);
        return $result;
}

}
