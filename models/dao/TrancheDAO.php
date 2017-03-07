<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 07-Mar-17
 * Time: 11:42
 */
class TrancheDAO
{
    private  $pdo;

    const sqlGetAll="SELECT  idTrancheAge as id,
		                     nomTrancheAge as nom,
                             descriptionTrancheAge as description
                     FROM TrancheAge;";

    const sqlGetById="SELECT  idTrancheAge as id,
		                     nomTrancheAge as nom,
                             descriptionTrancheAge as description
                     FROM TrancheAge WHERE idTrancheAge=?;";

    const sqlUpdate="";

    const sqlDeleteArt = "";

    /**
     * TrancheDAO constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function getListe(){
        $req=$this->pdo->query(self::sqlGetAll);
        $req->setFetchMode(PDO::FETCH_CLASS,Tranche::class);
        $tranche=$req->fetchAll();
        return $tranche;
    }






}