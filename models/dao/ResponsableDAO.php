<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 26-Jan-17
 * Time: 12:39
 */
class ResponsableDAO
{

    private  $pdo;

    const sqlGetById="SELECT   idResponsable as id,
                              nomResponsable as nom,
                              prenomResponsable as prenom,
                              rueResponsable as rueN,
                              villeResponsable as ville,
                              codeResponsable as code,
                              paysResponsable as pays,
                              emailResponsable as email,
                              tel1Responsable as tel1,
                              tel2Responsable as tel2
                     FROM Responsable WHERE idResponsable=?";

    const sqlGet="SELECT    idResponsable as id,
                              nomResponsable as nom,
                              prenomResponsable as prenom,
                              rueResponsable as rueN,
                              villeResponsable as ville,
                              codeResponsable as code,
                              paysResponsable as pays,
                              emailResponsable as email,
                              tel1Responsable as tel1,
                              tel2Responsable as tel2
                      FROM Responsable  right join ResponsableParticipant 
                                        on idResponsable=FK_idResponsable ";




    const sqlUpdate="";

    const sqlDeleteArt = "DELETE FROM Responsable WHERE idResponsable=?";



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
     * @return mixed Liste des touts les Responsable de la DB
     */
    public function getResponsables($where='',$param=null){

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
        $req->setFetchMode(PDO::FETCH_CLASS,Responsable::class);

        $req->execute($param);
        /*Car ça peut renvoir une liste de plusieurs responsables*/
        /*Un utilisateur peut avoir un/deux responsables*/
        $responsables=$req->fetchAll();
        return $responsables;
    }

    /**
     * @param $id  pour rechercher le responsable
     * @return array Responsables
     */
    public  function getByIdParticipant($id){

        return $this->getResponsables("WHERE FK_idResponsable=?",array($id));

    }

}