<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 23-Mar-17
 * Time: 11:00
 */
class ProfDAO
{
    private  $pdo;

    const sqlGetByIdCours="SELECT p.idProf as id,
                                  p.nomProf as nom,
                                  p.prenomProf as prenom
                           FROM prof p RIGHT JOIN CoursProf cp ON p.idProf=cp.FK_idProf
                           WHERE cp.FK_idCours=?;";

    const sqlGetAllProf="SELECT * FROM Prof;";

    const sqlUpdate="";

    const sqlDeleteArt = "DELETE FROM Prof  where idProf=?";

    /**
     * DaoCours constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $idCours
     * @return array Prof
     */
    public function getProfByCours($idCours){
        $req=$this->pdo->prepare(self::sqlGetByIdCours);
        $req->setFetchMode(PDO::FETCH_CLASS,Prof::class);
        $req->execute(array($idCours));
        $profs=$req->fetchAll();
        return $profs;
    }

}