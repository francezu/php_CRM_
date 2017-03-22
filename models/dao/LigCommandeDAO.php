<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 21-Feb-17
 * Time: 11:10
 */
class LigCommandeDao
{

    private $pdo;

    const sqlGetAll="";

    const sqlGetByIdCours="SELECT FK_idCommandeLig as idCommande,
                                   numLigCommande as numLig,
                                   FK_idParticipantLig as idParticipant,
                                   FK_idCoursLig as idCours
                           FROM LigCommande
                           WHERE FK_idCoursLig=?;";

    const sqlUpdate="";

    const sqlDeleteArt = "DELETE FROM LigCommande  where FK_idCommandeLig=?";

    /**
     * DaoCours constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $idCours L'id du Cours
     * @return array Une Array des LigCommande.(une LigCommande =obj COMMANDE ,obj Client,int numLig)
     */
    public function getGetAllByIdCoursWhiteCommandeAndParticipant($idCours){


        $req = $this->pdo->prepare(self::sqlGetByIdCours);

        /*Recup sur forme array [0...*] */
        $req->setFetchMode(PDO::FETCH_NUM);

        $req->execute(array($idCours));
        $result=$req->fetchAll();

        $participnatDAO=DaoFactory::getInstanceDaoFactory()->getParticipantDAO();
        $commandeDAO=DaoFactory::getInstanceDaoFactory()->getCommandeDAO();

        /* on cree l'obj LigCommande avec l'obj Participant et on l'ajoute a une array $lignes*/
         foreach ($result as $row ) {
             /*recuperation du Participant en function de l'id*/
            $participant=$participnatDAO->getFromId($row[2]);
             /*recuperation de la Commande en function de l'id*/
            $commande=$commandeDAO->getGetById($row[2]);

            $lignes[]=new LigCommande($commande,$row[1],$participant,$row[3]);
         }

        /*dans le cas ou le cours n'a pas d'inscriptions*/
         if(isset($lignes[0])){
             return $lignes ;
         }


    }
}