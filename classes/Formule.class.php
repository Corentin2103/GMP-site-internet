<?php
class Formule{

private $equation;
private $numEq;
private $libEq;




public function __construct($variable){
	if (!empty($variable))
			 $this->affecte($variable);

}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'Equation': $this->setEquation($valeur); break;
							case 'NumEq': $this->setNumEq($valeur); break;
              case 'LibEq': $this->setLibEq($valeur); break;


					}
			}
	}
public function getEquation() {
        return $this->equation;
    }
public function setEquation($valeur){
        $this->equation=$valeur;
    }

public function getNumEq() {
        return $this->numEq;
    }
public function setNumEq($valeur){
        $this->numEq=$valeur;
    }
public function getLibEq() {
		    return $this->libEq;
		}
public function setLibEq($valeur){
		    $this->libEq=$valeur;
		}
}
?>
