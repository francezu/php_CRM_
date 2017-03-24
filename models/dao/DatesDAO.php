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

    const sqlGetByIdCours="SELECT idDates as id,
                                  descriptionDates as description 
                                  FROM Dates WHERE FK_idCoursDates=?;";


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

    public  function  getDatesByIdCours($idCours){
        $req=$this->pdo->prepare(self::sqlGetByIdCours);
        $req->setFetchMode(PDO::FETCH_CLASS,Dates::class);
        $req->execute(array($idCours));
        $dates=$req->fetchAll();
        return $dates;

    }


}