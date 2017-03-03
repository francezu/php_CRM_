<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 21-Feb-17
 * Time: 11:14
 */
class CommandeDAO
{

    private $pdo;

    const sqlGetAll="";

    const sqlGetById="SELECT idCommande as id,
                               dateCommande as dateInscrption,
                               msgCommande as msg,
                               totalCommande as total ,
                               etalementPaiementCommande as etalmentPaiement,
                               paiementOnlineCommande as paiementOnline,
                               confCommande as confCommande,
                               noteCommande as note,
                               garderieCommande as garderie
                      FROM Commande
                      WHERE idCommande=? ;";

    const sqlUpdate="";

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
        $req->setFetchMode(PDO::FETCH_CLASS,Commande::class);
        $req->execute(array($id));
        $result=$req->fetch();
        return $result;
    }

}