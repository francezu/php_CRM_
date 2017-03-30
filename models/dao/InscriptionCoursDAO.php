<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 30-Mar-17
 * Time: 11:31
 */
class InscriptionCoursDAO
{

    private $pdo;

    const sqlGetAll="";

    const sqlGetById="SELECT idCommande as id,
                               dateCommande as dateInscrption,
                               msgCommande as msg,
                               totalCommande as total ,
                               etalementPaiementCommande as etalmentPaiement,
                               paiementOnlineCommande as paiementOnline,
                               confCommande as statutPaiement,
                               noteCommande as note,
                               garderieCommande as garderie
                      FROM Commande
                      WHERE idCommande=? ;";

    const sqlUpdatePaiement="UPDATE Commande SET confCommande=:statutPaiement WHERE idCommande=:idCommande;";

    const sqlDeleteArt = "DELETE FROM Commande  where idCommande=?";

    /**
     * DaoCours constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getGetById($id){

        $req=$this->pdo->prepare(self::sqlGetById);
        $req->setFetchMode(PDO::FETCH_CLASS,InscriptionCours::class);
        $req->execute(array($id));
        $result=$req->fetch();
        return $result;
    }

    public function updateEtatPaiement($id,$statutPaiement){
        $req=$this->pdo->prepare(self::sqlUpdatePaiement);
        $req->bindValue(':idCommande',$id);
        $req->bindValue(':statutPaiement',$statutPaiement);
        $reponse=$req->execute();
        return $reponse;
    }

}