<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 13-Jan-17
 * Time: 12:05
 */
class InscriptionAnniversairesDAO
{

     private  $pdo;

     const sqlGetAll="SELECT AC_C_Id as id,AC_C_AgeM as ageMayenne,AC_C_N as nbEnfants,AC_C_Date as dateSouhaite,
             AC_C_Date_Inscription as dateInscription, AC_C_Msg as msg,AC_C_Paye as confirmationPaiement 
             FROM ac_commande;";
     const sqlGetById="SELECT * FROM ac_commande where AC_C_Id=?";
     const sqlUpdate="";
     const sqlDeleteArt = "DELETE FROM plateau96_be.ac_commande where AC_C_Id=?";



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
     * @return mixed array d'inscription avec la personne corespondante
     */
    public function getListe(){
        /**
         * initialisation de la connection a la base de donnee
         */
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
          $listeInscriptions=$req->fetchAll(PDO::FETCH_CLASS,InscriptionAnniversaire::class);

        /*
         * creation d'une instance ParticipantDAO
         */
          $participantDao=DaoFactory::getInstanceDaoFactory()->getParticipantDAO();

          /*
           * En function de l'id de l'inscription on va aller rechercher le Participant
           * */
          for($i=0;$i<count($listeInscriptions);$i++){
              /*
               * pour chaque obj inscription de la liste on ajoute le participant corespondant en function de l'id de l'inscription
               * */
              $listeInscriptions[$i]->setParticipant($participantDao->getFromId($listeInscriptions[$i]->getId()));
          }

        /**
         * On revoie la liste des inscription avec l'obj personne corespondant
         */
        return $listeInscriptions;
    }

    /**
     * @param $id InscriptionAnniversaire
     * @return InscriptionAnniversaire
     */
    public  function getFromId($id){
        $req=$this->pdo->query(self::sqlGetById);
        /*
         * dans quelle forme on veut recupere les valeur de la DB
         * */
        $req->setFetchMode(PDO::FETCH_CLASS,InscriptionAnniversaire::class);
        $req->execute(array($id));

        $inscription=$req->fetch();
        /*
         * creation DAO Participant
         * */
        $participantDAO=DaoFactory::getInstanceDaoFactory()->getParticipantDAO();
        /*
         * recuperation du Participant en function de l'id et l'insertion de celui ici dans l'obj inscription
         */
        $inscription->setParticipant($participantDAO->getFromId($inscription->getId()));

        return $inscription;

    }


}