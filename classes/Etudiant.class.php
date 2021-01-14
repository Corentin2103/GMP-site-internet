<?php
class Etudiant{

  private $per_num;
  private $dep_num;
  private $div_num;

  public function __construct($etudiant){
    if (!empty($etudiant))
    $this->affecte($etudiant);

  }
  public function affecte($donnees){
    foreach ($donnees as $attribut => $valeur){
      switch ($attribut){
        case 'per_num': $this->setPersNum($valeur); break;
        case 'etu_nom': $this->setEtuNom($valeur); break;
        case 'etu_prenom': $this->setEtuPrenom($valeur); break;
        case 'etu_annee': $this->setEtuAnnee($valeur); break;

      }
    }
  }

  /*NUMERO*/
  public function getPersNum() {
    return $this->per_num;
  }
  public function setPersNum($valeur){
    $this->per_num=$valeur;
  }
  /*Numero du departement*/
  public function getEtuNom() {
    return $this->etu_nom;
  }
  public function setEtuNom($valeur){
    $this->etu_nom=$valeur;
  }
  /*Numero division*/
  public function getEtuPrenom() {
    return $this->etu_prenom;
  }
  public function setEtuPrenom($valeur){
    $this->etu_prenom=$valeur;
  }
  public function getEtuAnnee() {
    return $this->etu_annee;
  }
  public function setEtuAnnee($valeur){
    $this->etu_annee=$valeur;
  }
}
?>
