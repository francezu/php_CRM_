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

    const sqlGetById="SELECT idProfil as id,
                             newsletterProfil as newsletter,
	                         photoProfil as  photo	    
                      FROM Profil 
                      WHERE idProfil=?";

    const sqlGet="SELECT idProfil as id,
                            newsletterProfil as newsletter,
	                        photoProfil as  photo	    
                      FROM Profil ";

    const sqlInsert="";

    const sqlUpdate="";

    const sqlDelete = "DELETE FROM Profil where FK_idParticipantProfil=?";


    /**
     * @param $statement  la requet que l'on veut faire
     * @param $class_name la class aveque la quelle a macher
     * @return array un tableau avec les ligne de la base de donnee
     */


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getById($id){

        $req=$this->pdo->query(self::sqlGetById);
        $req->setFetchMode(PDO::FETCH_NUM);
        $req->execute(array($id));
        $result=$req->fetch();
        $profile=new Profil($result[0],$result[1],$result[2]);
        return $profile;
    }


    public  function getProfil($where="",$param){

        $sql=self::sqlGet.$where;
        $req=$this->pdo->prepare($sql);
        $req->setFetchMode(PDO::FETCH_NUM);
        $req->execute($param);
        $result=$req->fetchAll();

        $profiles=[];
        foreach ($result as $row ){
            $profiles[]=new Profil($row[1],$row[2],$row[0]);
        }
        return $profiles;
    }


    public  function  getByIdParticipant($id){
            $profil=$this->getProfil('WHERE FK_idParticipantProfil=?',array($id));
            return $profil[0];
    }
}