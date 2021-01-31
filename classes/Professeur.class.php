<?php
class Professeur{

private $per_num;
private $prof_nom;
private $prof_prenom;

public function __construct($prof){
	if (!empty($prof))
			 $this->affecte($prof);

}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'per_num': $this->setPersNum($valeur); break;
							case 'prof_nom': $this->setProfNom($valeur); break;
							case 'prof_prenom': $this->setProfPrenom($valeur); break;
					}
			}
	}

/*Personne NUMERO*/
public function getPersNum() {
        return $this->per_num;
    }
public function setPersNum($valeur){
        $this->per_num=$valeur;
    }
/*Tel*/
public function getProfNom() {
		    return $this->prof_nom;
	  }
public function setProfNom($valeur){
		    $this->prof_nom=$valeur;
		}
/*Fonction numero*/
public function getProfPrenom() {
				return $this->prof_prenom;
	  }
public function setProfPrenom($valeur){
				$this->prof_prenom=$valeur;
	  }
}
?>
