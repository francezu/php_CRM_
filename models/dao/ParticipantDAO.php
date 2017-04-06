<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 26-Jan-17
 * Time: 12:05
 */
class ParticipantDAO
{

    /**
     * @var PDO
     */
    private  $pdo;

    const sqlGetById="SELECT idParticipant as id,
                               nomParticipant as nom,
                               prenomParticipant as prenom,
                               dateNaissanceParticipant as dateNaissance,
                               sexParticipant as sex,
                               rueParticipant as rueN,
                               villeParticipant as ville,
                               codeParticipant as code,
                               paysParticipant as pays,
                               emailParticipant as email,
                               tel1Participant as tel1,
                               tel2Participant as tel2
                        FROM Participant  
                        WHERE idParticipant=?";

    const sqlGet="SELECT idParticipant as id,
                               nomParticipant as nom,
                               prenomParticipant as prenom,
                               dateNaissanceParticipant as dateNaissance,
                               sexParticipant as sex,
                               rueParticipant as rueN,
                               villeParticipant as ville,
                               codeParticipant as code,
                               paysParticipant as pays,
                               emailParticipant as email,
                               tel1Participant as tel1,
                               tel2Participant as tel2
                        FROM Participant";

    const sqlInsert="";

    const sqlUpdate="";

    const sqlDelete = "DELETE FROM Participant where idParticipant=?";



    /**
     * @param $statement  la requet que l'on veut faire
     * @param $class_name la class aveque la quelle a macher
     * @return array un tableau avec les ligne de la base de donnee
     */


    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }

    /**
     * @param $id Participant
     * @return Participant avec le Responsable Corespondant
     */
    public  function getById($id){
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
        $responsables=$responsableDAO->getByIdParticipant($participant->getId());
        /*recuperation du profile en function de l'id du participant*/
        $profil=$profilDAO->getByIdParticipant($participant->getId());

        /*
         * On ajoute le responsable et le profil a l'objet participant
         */
        $participant->setResponsables($responsables);
        /*modification du profil du Participant pour respecte la composition*/
        $participant->getProfil()->setId($profil->getId());
        $participant->getProfil()->setNewsletter($profil->getNewsletter());
        $participant->getProfil()->setPhoto($profil->getPhoto());
        return $participant;
    }

    /**
     * @param string $WHERE
     * @return array Participant
     */
    public function getParticipants($where='',$param=null,$FetchType=false){

        $sql=self::sqlGet.$where;

        /**
         * statement a execute sur la base de donnee
         */
        $req=$this->pdo->prepare($sql);
        /**
         * fetchAll() va nous renvoier les resultat sur forme d'un tableau
         * on peut preciser en parametre le syle de fetch que l'on veut pour nous comme on travail avec des objects c'est preferable que l'on recois des obj
         * pour ca il faut specifie en parametre PDO::FETCH_OBJ
         * PDO::FETCH_OBJ : retourne un objet anonyme avec les noms de propriétés qui correspondent aux noms des colonnes retournés dans le jeu de résultats
         * PDO::FETCH_CLASS et en seconde param a classe a charger
         */
        $req->setFetchMode(PDO::FETCH_CLASS,Participant::class);
        $req->execute($param);
        $participants=$req->fetchAll();

        if($FetchType){
            /* a chaque participants on lui ajoute le profil et le/les Responsable(s)*/
            $responsableDao=DaoFactory::getInstanceDaoFactory()->getResponsableDAO();
            $profilDao=DaoFactory::getInstanceDaoFactory()->getProfilDAO();


            for($i=0;$i<count($participants);$i++){
                $participants[$i]->setProfil($profilDao->getByIdParticipant($participants[$i]->getId()));
                $participants[$i]->setResponsables($responsableDao->getByIdParticipant($participants[$i]->getId()));
            }
        }

        return $participants;
    }

}