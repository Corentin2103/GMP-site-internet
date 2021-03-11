<?php

class ReponseManager{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function add($reponse){
        $requete = $this->db->prepare(
            'INSERT INTO reponse (per_num, rep_question, rep_reponse, rep_unite) VALUES (:per_num, :rep_question, :rep_reponse,:rep_unite);');

        $requete->bindValue(':per_num',$reponse->getPersNum());
        $requete->bindValue(':rep_question',$reponse->getRepQuestion());
        $requete->bindValue(':rep_reponse',$reponse->getRepReponse());
        $requete->bindValue(':rep_unite',$reponse->getRepUnite());
        $retour=$requete->execute();
        return $retour;
    }

    public function getAllReponse(){
        $listeReponse = array();

        $sql = 'select per_num, rep_question, rep_reponse, rep_unite FROM reponse';

        $requete = $this->db->prepare($sql);
        $requete->execute();

        while ($reponse = $requete->fetch(PDO::FETCH_OBJ))
            $listeReponse[] = new Reponse($reponse);

        $requete->closeCursor();
        returnReponse;
    }



    public function updateReponse($reponse){
        $sql ='UPDATE reponse SET rep_question= :rep_question, rep_reponse =:rep_reponse, rep_unite =:rep_unite where per_num= :per_num ';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':rep_question',$reponse->getRepQuestion());
        $requete->bindValue(':rep_reponse',$reponse->getRepReponse());
        $requete->bindValue(':rep_unite',$reponse->getRepUnite());
        $requete->bindValue(':per_num',$reponse->getPersNum());
        $retour = $requete->execute();
        $requete->closeCursor();
        return $retour;
    }

}