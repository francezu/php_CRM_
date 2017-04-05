<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 23-Mar-17
 * Time: 12:12
 */
class DatesDAO
{

    private  $pdo;

    const sqlGetById="SELECT idDates as id,
                                  descriptionDates as description 
                                  FROM Dates WHERE idDates=?;";

    const sqlGet="SELECT idDates as id,
                          descriptionDates as description 
                          FROM Dates ";

    const sqlInsert="";

    const sqlUpdate="";

    const sqlDeleteArt = "DELETE FROM Dates  where idDates=?";

    /**
     * DaoCours constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getDates($where="",$param=null,$FetchType=false){

        $sql=self::sqlGet.$where;
        $req=$this->pdo->prepare($sql);
        $req->setFetchMode(PDO::FETCH_CLASS,Dates::class);
        $req->execute($param);
        $dates=$req->fetchAll();
        return $dates;

    }

    public  function  getDatesByIdCours($idCours){

        return $this->getDates('WHERE FK_idCoursDates=?',array($idCours),false);

    }


}