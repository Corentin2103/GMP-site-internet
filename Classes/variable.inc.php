<?php
class Variable{

private $var1;
private $var2;
private $var3;
private $var4;
private $var5;
private $var6;
private $var7;
private $var8;
private $var9;



public function __construct($variable){
	if (!empty($variable))
			 $this->affecte($variable);

}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case '$var1': $this->setVar1($valeur); break;
							case '$var2': $this->setVar2($valeur); break;
              case '$var3': $this->setVar3($valeur); break;
              case '$var4': $this->setVar4($valeur); break;
              case '$var5': $this->setVar5($valeur); break;
              case '$var6': $this->setVar6($valeur); break;
              case '$var7': $this->setVar7($valeur); break;
              case '$var8': $this->setVar8($valeur); break;
              case '$var9': $this->setVar9($valeur); break;

					}
			}
	}
public function getVar1() {
        return $this->$var1;
    }
public function setVar1($valeur){
        $this->$var1=$valeur;
    }

public function getVar2() {
        return $this->$var1;
    }
public function setVar2($valeur){
        $this->$var1=$valeur;
    }

}
?>
