<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 21-Feb-17
 * Time: 11:10
 */
class LigInscriptionCoursDao
{

    private $pdo;

    const sqlGet="SELECT FK_idCommandeLig as idCommande,
                                   numLigCommande as numLig,
                                   FK_idParticipantLig as idParticipant,
                                   FK_idCoursLig as idCours
                           FROM LigCommande ";

    const sqlInsert="";

    const sqlUpdate="";

    const sqlDelete = "DELETE FROM LigCommande  where FK_idCommandeLig=?";

    /**
     * DaoCours constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $where rexExp
     * @param $param array for where
     * @param  boolean $FetchType  default=LAZY or EAGER Cours,Inscription,Participant;
     * @return array LigInscriptionCours
     */
    public function getLigInscriptionCours($where="",$param=null,$FetchType=false){
        $sql=self::sqlGet.$where;
        $req=$this->pdo->prepare($sql);
        /*Recup sur forme array [0...*] */
        $req->setFetchMode(PDO::FETCH_NUM);
        $req->execute($param);
        $result=$req->fetchAll();
        if($FetchType){

            $participnatDAO=DaoFactory::getInstanceDaoFactory()->getParticipantDAO();
            $inscriptionCoursDAO=DaoFactory::getInstanceDaoFactory()->getInscriptionCoursDAO();
            $coursDAO=DaoFactory::getInstanceDaoFactory()->getCoursDAO();


            foreach ($result as $row ) {
                /*recuperation du Participant en function de l'id*/
                $participant=$participnatDAO->getById($row[2]);
                /*recuperation de la Commande en function de l'id*/
                $inscription=$inscriptionCoursDAO->getGetById($row[2]);
                $cours=$coursDAO->getById($row[3]);

                $lignes[]=new LigInscriptionCours($inscription,$row[1],$participant,$cours);
            }

            /*dans le cas ou le cours n'a pas d'inscriptions*/
            if(isset($lignes[0])){
                return $lignes ;
            }

        }

    }

    /**
     * @param $idCours L'id du Cours
     * @return array  LigInscriptionCours (LigInscription ,Participant,int numLig,Cours)
     */
    public function getGetByIdCours($idCours){
        return $this->getLigInscriptionCours("WHERE FK_idCoursLig=?",array($idCours),true);

    }
}