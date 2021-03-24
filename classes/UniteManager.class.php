<?php
class UniteManager{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function add($unite){

        $requete = $this->db->prepare(
            'INSERT INTO unite (unite_nom,unite_num) VALUES (:unite_nom, :unite_num);');
        $requete->bindValue(':unite_nom',$unite->getUniteNom());
        $requete->bindValue(':unite_num',$unite->getUniteNum());
        $retour=$requete->execute();
        $num = $this->db->lastInsertID();
        return $num;
    }

    public function getList() {
        $req = $this->db->query('SELECT unite_nom, unite_num FROM unite');
        	$liste = array();
        while ($unite = $req->fetch(PDO::FETCH_OBJ)) {
            $liste[] = new Unite($unite);
        }
        $req->closeCursor();
        return $liste;
    }
}
