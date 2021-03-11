<?php

class Unite{

    private $unite_num;
    private $unite_nom;

    public function __construct($unite){
        if (!empty($unite))
            $this->affecte($unite);

    }

    public function affecte($donnees){
        foreach ($donnees as $attribut => $valeur){
            switch ($attribut){
                case 'unite_num': $this->setUniteNum($valeur); break;
                case 'unite_nom': $this->setUniteNom($valeur); break;

            }
        }
    }

    /*UNITE_NUM*/
    public function getUniteNum() {
        return $this->unite_num;
    }
    public function setUniteNum($valeur){
        $this->unite_num=$valeur;
    }

    /*UNITE_NOM*/
    public function getUniteNom() {
        return $this->unite_nom;
    }
    public function setUniteNom($valeur){
        $this->punite_nom=$valeur;
    }

}