<?php
class VilleManager{
  private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
    public function add($variable){
          $requete = $this->db->prepare(
          'INSERT INTO variable (vil_num, vil_nom) VALUES (:vil_num, :vil_nom);');

          $requete->bindValue(':vil_num',$ville->getVilleNum());
          $requete->bindValue(':vil_nom',$ville->getVilleNom());
          $retour=$requete->execute();
          return $retour;
      }

    function lire_csv($nom_fichier,$separateur){
      $fichier = fopen($nom_fichier,'r');
      $i = 1;
      $taille=filesize('Excel/'.$uniqueName.$fileExt)+1;

      while($donnee = fgetcsv($fichier,$taille,$separateur)){
        
      }


}
