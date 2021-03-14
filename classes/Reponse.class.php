<?php
class Reponse{

    private $per_num;
    private $rep_question;
    private $rep_reponse;
    private $rep_unite;

    public function __construct($reponse){
        if (!empty($reponse))
            $this->affecte($reponse);

    }

    public function affecte($donnees){
        foreach ($donnees as $attribut => $valeur){
            switch ($attribut){
                case 'per_num': $this->setPersNum($valeur); break;
                case 'rep_question': $this->setRepQuestion($valeur); break;
                case 'rep_reponse': $this->setRepReponse($valeur); break;
                case 'rep_unite': $this->setRepUnite($valeur); break;

            }
        }
    }

    /*PER_NUM*/
    public function getPersNum() {
        return $this->per_num;
    }
    public function setPersNum($valeur){
        $this->per_num=$valeur;
    }

    /*REP_QUESTION*/
    public function getRepQuestion() {
        return $this->per_num;
    }
    public function setRepQuestion($valeur){
        $this->per_num=$valeur;
    }

    /*REP_REPONSE*/
    public function getRepReponse() {
        return $this->per_num;
    }
    public function setRepReponse($valeur){
        $this->per_num=$valeur;
    }

    /*REP_UNITE*/
    public function getRepUnite() {
        return $this->per_num;
    }
    public function setRepUnite($valeur){
        $this->per_num=$valeur;
    }
}?>