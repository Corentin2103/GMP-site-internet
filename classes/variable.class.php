<?php
class Variable{

private $variable1;
private $variable2;
private $variable3;
private $variable4;
private $variable5;
private $variable6;
private $variable7;
private $variable8;
private $variable9;



public function __construct($variable){
	if (!empty($variable))
			 $this->affecte($variable);

}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'variable1': $this->setVar1($valeur); break;
							case 'variable2': $this->setVar2($valeur); break;
              case 'variable3': $this->setVar3($valeur); break;
              case 'variable4': $this->setVar4($valeur); break;
              case 'variable5': $this->setVar5($valeur); break;
              case 'variable6': $this->setVar6($valeur); break;
              case 'variable7': $this->setVar7($valeur); break;
              case 'variable8': $this->setVar8($valeur); break;
              case 'variable9': $this->setVar9($valeur); break;

					}
			}
	}
public function getVar1() {
        return $this->variable1;
    }
public function setVar1($valeur){
        $this->variable1=$valeur;
    }

public function getVar2() {
        return $this->variable2;
    }
public function setVar2($valeur){
        $this->variable2=$valeur;
    }
public function getVar3() {
		    return $this->variable3;
		}
public function setVar3($valeur){
		    $this->variable3=$valeur;
		}
		public function getVar4() {
		        return $this->variable4;
		    }
		public function setVar4($valeur){
		        $this->variable4=$valeur;
		    }

		public function getVar5() {
		        return $this->variable5;
		    }
		public function setVar5($valeur){
		        $this->variable5=$valeur;
		    }
		public function getVar6() {
				    return $this->variable6;
				}
		public function setVar6($valeur){
				    $this->variable6=$valeur;
				}
				public function getVar7() {
								return $this->variable7;
						}
				public function setVar7($valeur){
								$this->variable7=$valeur;
						}

				public function getVar8() {
								return $this->variable8;
						}
				public function setVar8($valeur){
								$this->variable8=$valeur;
						}
				public function getVar9() {
								return $this->variable9;
						}
				public function setVar9($valeur){
								$this->variable9=$valeur;
						}

}
?>
