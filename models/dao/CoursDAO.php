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

    const sqlGetByCategorie="SELECT idCours as id,
                               codeCours as code,
                               nomCours as nom,
                               descriptionCours as description,
                               materielCours materiel,
                               heureDCours as heureD,
                               heureFCours as heureF,
                               prixCours as prix,
                               FK_idTrancheAgeCours as trancheAge
                      FROM Cours 
                      WHERE FK_anneeCategorieCours=? and FK_idCategorieCours=?;";

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

    const sqlUpdate="";

    const sqlDeleteArt = "DELETE FROM Cours  where idCours=?";

    /**
     * DaoCours constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $annee int
     * @param $categorie string
     * @return mixed Liste des Cours Sans Participants en function de Type et de l'annee
     */
    public function getALLCoursByYearAndType($annee,$categorie){
        $req=$this->pdo->prepare(self::sqlGetAll);
        $req->setFetchMode(PDO::FETCH_CLASS,Cours::class);
        $req->execute(array($annee,$categorie));
        $cours=$req->fetchAll();
        return $cours;
    }

    /**
     * @param $annee int
     * @param $categorie string
     * @return mixed
     */
    public function getAllCoursByYearAndTypeWhiteLigCommande($annee,$categorie){

        $req = $this->pdo->prepare(self::sqlGetByCategorie);
        /*
         * dans quelle forme on recupere les valeur de la DB
         * */
        $req->setFetchMode(PDO::FETCH_CLASS,Cours::class);

        $req->execute(array($annee,$categorie));
        /*Recup cours en function du Type et Annee ex(Ateliers de l'annee scolaire  2015-2017)*/
        $cours=$req->fetchAll();


        $ligCommandeDao=DaoFactory::getInstanceDaoFactory()->getLigCommandeDAO();
        /*on a besoin de chaque ligne de la commande où l'id participant correspond  avec l'id cours*/
        for($i=0;$i<count($cours);$i++){
            /*on recup les lignes commande corespondant au cours avec obj Commande et Participant*/
            $lignes=$ligCommandeDao->getGetAllByIdCoursWhiteCommandeAndParticipant($cours[$i]->getId());
               /*on ajoute les participants ou cours*/
               $cours[$i]->setLigCommande($lignes);
               /*car si non les valeurs vont êtré seulment ramplacer */
               unset($participants);
        }


        return $cours;
    }




}