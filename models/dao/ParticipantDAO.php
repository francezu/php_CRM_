<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 26-Jan-17
 * Time: 12:05
 */
class ParticipantDAO
{

    private  $pdo;

    const sqlGetAll="SELECT p.idParticipant as id,
                               p.nomParticipant as nom,
                               p.prenomParticipant as prenom,
                               p.dateNaissanceParticipant as dateNaissance,
                               p.sexParticipant as sex,
                               p.rueParticipant as rue,
                               p.villeParticipant as ville,
                               p.codeParticipant as code,
                               p.paysParticipant as pays,
                               p.emailParticipant as email,
                               p.tel1Participant as tel1,
                               p.tel2Participant as tel2
                        FROM Participant p ;";

    const sqlGetById="SELECT p.idParticipant as id,
                               p.nomParticipant as nom,
                               p.prenomParticipant as prenom,
                               p.dateNaissanceParticipant as dateNaissance,
                               p.sexParticipant as sex,
                               p.rueParticipant as rue,
                               p.villeParticipant as ville,
                               p.codeParticipant as code,
                               p.paysParticipant as pays,
                               p.emailParticipant as email,
                               p.tel1Participant as tel1,
                               p.tel2Participant as tel2
                        FROM Participant p 
                        WHERE p.idParticipant=?;";

    const sqlUpdate="";
    const sqlDeleteArt = "DELETE FROM Participant where idParticipant=?";



    /**
     * @param $statement  la requet que l'on veut faire
     * @param $class_name la class aveque la quelle a macher
     * @return array un tableau avec les ligne de la base de donnee
     */


    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }



    public function getListe(){


        /**
         * statement a execute sur la base de donnee
         */
        $req=$this->pdo->query(self::sqlGetAll);
        /**
         * fetchAll() va nous renvoier les resultat sur forme d'un tableau
         * on peut preciser en parametre le syle de fetch que l'on veut pour nous comme on travail avec des objects c'est preferable que l'on recois des obj
         * pour ca il faut specifie en parametre PDO::FETCH_OBJ
         * PDO::FETCH_OBJ : retourne un objet anonyme avec les noms de propriétés qui correspondent aux noms des colonnes retournés dans le jeu de résultats
         * PDO::FETCH_CLASS et en seconde param a classe a charger
         */
        $participants=$req->fetchAll(PDO::FETCH_CLASS,Participant::class);

        /* a chaque participants on lui ajoute le profil et le/les Responsable(s)*/
        $responsableDao=DaoFactory::getInstanceDaoFactory()->getResponsableDAO();
        $profilDao=DaoFactory::getInstanceDaoFactory()->getProfilDAO();


        for($i=0;$i<count($participants);$i++){
            $participants[$i]->setProfil($profilDao->getFromId($participants[$i]->getId()));
            $participants[$i]->setResponsables($responsableDao->getFromId($participants[$i]->getId()));
        }

        return $participants;
    }

    /**
     * @param $id Participant
     * @return Participant avec le Responsable Corespondant
     */
    public  function getFromId($id){
        /*
         * Recuperation de la personne en function de l'id
         */
        $req = $this->pdo->prepare(self::sqlGetById);
        /*
         * dans quelle forme on veut recupere les valeur de la DB
         * */
        $req->setFetchMode(PDO::FETCH_CLASS,Participant::class);

        $req->execute(array($id));

        $participant=$req->fetch();
        /*
         * Creation du DAO pour responsable et profil
         */
        $responsableDAO=DaoFactory::getInstanceDaoFactory()->getResponsableDAO();
        $profilDAO=DaoFactory::getInstanceDaoFactory()->getProfilDAO();

        /*
         * Recuperation un ou plusieurs  Responsable en function de l'id du Participant
         */
        $responsables=$responsableDAO->getFromId($participant->getId());
        /*recuperation du profile en function de l'id du participant*/
        $profil=$profilDAO->getFromId($participant->getId());

        /*
         * On ajoute le responsable et le profil a l'objet participant
         */
        $participant->setResponsables($responsables);
        $participant->setProfil($profil);
        return $participant;
    }

    public  function getFromCours($cours){
        /*
         * Recuperation de la personne en function de cours
         */
        $req = $this->pdo->prepare(self::sqlGetByCours);
        /*
         * dans quelle forme on veut recupere les valeur de la DB
         * */
        $req->setFetchMode(PDO::FETCH_CLASS,Participant::class);
        $req->execute(array($cours));
        $participants=$req->fetchAll();
        return $participants;
    }

}