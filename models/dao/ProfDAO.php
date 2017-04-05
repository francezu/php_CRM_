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

    const sqlGetById="SELECT idProf as id,
                                  nomProf as nom,
                                  prenomProf as prenom
                           FROM prof WHERE idProf=?";

    const sqlGet="SELECT idProf as id,
                                  nomProf as nom,
                                  prenomProf as prenom
                           FROM prof  RIGHT JOIN CoursProf  ON idProf=FK_idProf ";

    const sqlInsert="";

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
    public function getById($id){

        $req=$this->pdo->prepare(self::sqlGetById);

        $req->setFetchMode(PDO::FETCH_CLASS,Prof::class);

        $req->execute(array($id));

        $profs=$req->fetch();
        return $profs;
    }

    public function getProf($where="",$param=null){
        $sql=self::sqlGet.$where;

        $req=$this->pdo->prepare($sql);

        $req->setFetchMode(PDO::FETCH_CLASS,Prof::class);

        $req->execute($param);

        $profs=$req->fetchAll();
        return $profs;
    }

    /**
     * @param $idCours
     * @return array Prof
     */
    public function getByIdCours($idCours){

        return $this->getProf('WHERE FK_idCours=?',array($idCours));
    }

}