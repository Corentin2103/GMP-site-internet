<?php
class EtudiantManager {
  private $db;

  public function __construct($db){
        $this->db = $db;
  }

  public function getAllEtudiants(){
      $listeEtudiant = array();
      $sql = 'SELECT * FROM Etudiant ORDER BY per_num';

      $requete = $this->db->prepare($sql);
      $requete->execute();

      while ($etudiant = $requete->fetch(PDO::FETCH_OBJ))
          $listeEtudiant[] = new Etudiant($etudiant);

      $requete->closeCursor();
      return $listeEtudiant;
  }
