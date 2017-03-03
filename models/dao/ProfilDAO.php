<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 02-Feb-17
 * Time: 09:51
 */
class ProfilDAO
{

    private  $pdo;

    const sqlGetAll="SELECT idProfil as id,
                            newsletterProfil as newsletter,
	                        photoProfil as  photo	    
                      FROM Profil ;";

    const sqlGetById="SELECT idProfil as id,
                             newsletterProfil as newsletter,
	                         photoProfil as  photo	    
                      FROM Profil 
                      WHERE FK_idParticipantProfil=?;";
    const sqlUpdate="";

    const sqlDeleteArt = "DELETE FROM Profil where FK_idParticipantProfil=?";



    /**
     * @param $statement  la requet que l'on veut faire
     * @param $class_name la class aveque la quelle a macher
     * @return array un tableau avec les ligne de la base de donnee
     */


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public  function getListe(){
        $req=$this->pdo->query(self::sqlGetById);

        $req->setFetchMode(PDO::FETCH_CLASS,Profile::class);

        $listeProfile=$req->fetchAll();

        return $listeProfile;
    }


    public  function  getFromId($id){
        $req=$this->pdo->prepare(self::sqlGetById);

        $req->setFetchMode(PDO::FETCH_CLASS,Profil::class);

        $req->execute(array($id));

        $profil=$req->fetch();

        return $profil;
    }
}