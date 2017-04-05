<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 20-Feb-17
 * Time: 11:13
 */
class CoursDao
{
    private  $pdo;

    const sqlGetById="SELECT idCours as id,
                               codeCours as code,
                               nomCours as nom,
                               descriptionCours as description,
                               materielCours materiel,
                               heureDCours as heureD,
                               heureFCours as heureF,
                               prixCours as prix,
                               FK_idTrancheAgeCours as trancheAge
                      FROM Cours  
                      WHERE idCours=? ;";

    const sqlGet="SELECT idCours as id,
                               codeCours as code,
                               nomCours as nom,
                               descriptionCours as description,
                               materielCours materiel,
                               heureDCours as heureD,
                               heureFCours as heureF,
                               prixCours as prix,
                               FK_idTrancheAgeCours as trancheAge
                      FROM Cours ";

    const sqlInsert="";

    const sqlUpdate="";

    const sqlDelete = "DELETE FROM Cours  where idCours=?";

    /**
     * DaoCours constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function  getById($id){
        $req=$this->pdo->prepare(self::sqlGetById);
        $req->setFetchMode(PDO::FETCH_CLASS,Cours::class);
        $req->execute(array($id));
        $cours=$req->fetch();
        return $cours;
    }

    /**
     * @param $where rexExp
     * @param $param array for where
     * @param  boolean $FetchType  default=LAZY or EAGER LigInscriptionCours,Prof,Dates;
     * @return array Cours
     */
    public function getCours($where="",$param=null,$FetchType=false){
        /*construction de la requête SQL*/
        $sql=self::sqlGet.$where;

        $req=$this->pdo->prepare($sql);

        $req->setFetchMode(PDO::FETCH_CLASS,Cours::class);

        $req->execute($param);

        $cours=$req->fetchAll();

        /*Si true recup les depencendes EADGER*/
        if($FetchType){
            $ligInscriptionCoursDao=DaoFactory::getInstanceDaoFactory()->getLigInscriptionCoursDAO();
            $profs=DaoFactory::getInstanceDaoFactory()->getProfDAO();
            $dates=DaoFactory::getInstanceDaoFactory()->getDatesDAO();
            /*on a besoin de chaque ligne de la commande où l'id participant correspond  avec l'id cours*/
            for($i=0;$i<count($cours);$i++){
                /*recup le/les prof(s)*/
                $cours[$i]->setProf($profs->getByIdCours($cours[$i]->getId()));
                $cours[$i]->setDate($dates->getDatesByIdCours($cours[$i]->getId()));
                /*on recup les lignes commande corespondant au cours avec obj Commande et Participant*/
                $lignes=$ligInscriptionCoursDao->getGetByIdCours($cours[$i]->getId());
                /*on ajoute les participants ou cours*/
                $cours[$i]->setLigInscriptionCours($lignes);
                /*car si non les valeurs vont êtré seulment ramplacer */
                unset($participants);
            }
        }

        return $cours;
    }

    /**
     * @param $annee int
     * @param $categorie string
     * @return array Cours
     */
    public function getByIdCategorie($annee,$categorie){
        $cours=$this->getCours('WHERE FK_anneeCategorieCours=? and FK_idCategorieCours=?',array($annee,$categorie),true);
        return $cours;
    }




}