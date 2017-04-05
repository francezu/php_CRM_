<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 07-Mar-17
 * Time: 11:42
 */
class TrancheDAO
{
    /**
     * @var
     */
    private  $pdo;

    const sqlGetById="SELECT  idTrancheAge as id,
		                     nomTrancheAge as nom,
                             descriptionTrancheAge as description
                     FROM TrancheAge WHERE idTrancheAge=?;";

    const sqlGet="SELECT  idTrancheAge as id,
		                     nomTrancheAge as nom,
                             descriptionTrancheAge as description
                     FROM TrancheAge ";

    const sqlInsert="";

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

    /**
     * @param $id
     * @return array Tranche
     */
    public function getById($id){
        $req=$this->pdo->query(self::sqlGetById);
        $req->setFetchMode(PDO::FETCH_CLASS,Tranche::class);
        $tranche=$req->fetch();
        return $tranche;

    }

    /**
     * @param string $where
     * @param null $param
     * @return array Tranche
     */
    public function getTranche($where="", $param=null){

        $sql=self::sqlGet.$where;
        $req=$this->pdo->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS,Tranche::class);
        $req->execute($param);
        $tranche=$req->fetchAll();
        return $tranche;
    }


    /**
     * @return array Tranche
     */
    public function getAll(){
        return $this->getTranche();
    }






}