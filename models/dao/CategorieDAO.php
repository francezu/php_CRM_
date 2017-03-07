<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 20-Feb-17
 * Time: 10:34
 */
class CategorieDao
{

    private  $pdo;

    const sqlGetAll="SELECT anneeCategorie as annee,
	                        idCategorie as codeCategorie,
                            nomCategorie as nomCategorie
                     FROM Categorie;";

    const sqlGetById="SELECT anneeCategorie AS annee, idCategorie AS codeCategorie, nomCategorie AS nomCategorie FROM categorie cat
                            where cat.anneeCategorie=? and cat.idCategorie=?
                      union 
                      SELECT s.anneeCategorie AS annee, s.idCategorie  AS codeCategorie, s.nomCategorie AS nomCategorie FROM categorie s 
                            inner join categorie c 
                            on s.FK_anneeCategorie=c.anneeCategorie and s.FK_idCategorie=c.idCategorie
                            where c.anneeCategorie=? and c.idCategorie=? ;";

    const sqlUpdate="";

    const sqlDeleteArt = "DELETE FROM Categorie where anneeCategorie=? AND  idCategorie=?";

    /**
     * DaoCategorie constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
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
        $categories=$req->fetchAll(PDO::FETCH_CLASS,Categorie::class);
        /*Recuperation DAO Cours*/
        $coursDao=DaoFactory::getInstanceDaoFactory()->getCoursDAO();

        for($i=0;$i<count($categories);$i++){

           $cours=$coursDao->getListeAvecLigCommande($categories[$i]->getAnnee(),$categories[$i]->getCodeCategorie());

           $categories[$i]->setCours($cours);

        }

        return $categories;
    }

    /**
     * @param $id Participant
     * @return Participant avec le Responsable Corespondant
     */
    public  function getAllCoursByTypeAndYear($annee,$categorie){
        $req=$this->pdo->prepare(self::sqlGetById);
        $req->setFetchMode(PDO::FETCH_CLASS,Categorie::class);
        $req->execute(array($annee,$categorie,$annee,$categorie));
        $categories=$req->fetchAll();
        /*Recuperation DAO Cours*/
        $coursDao=DaoFactory::getInstanceDaoFactory()->getCoursDAO();
        $listeCours=[];
        for($i=0;$i<count($categories);$i++){
            $coursCat=$coursDao->getListeAvecLigCommande($categories[$i]->getAnnee(),$categories[$i]->getCodeCategorie());
            $listeCours=array_merge($listeCours,$coursCat);
        }
        return  $listeCours;
    }


    public function getCoursTrancheAge($annee,$categorie){
        $listeCours=$this->getAllCoursByTypeAndYear($annee,$categorie);

        /*Recuperation tranche age*/
        $trancheDao=DaoFactory::getInstanceDaoFactory()->getTrancheDAO();
        $listetrancheAge=$trancheDao->getListe();

        foreach ($listetrancheAge as $tranche){
            

        }

    }


    public  function getCoursBySousCategorie($annee,$categorie){
        $req=$this->pdo->prepare(self::sqlGetById);
        $req->setFetchMode(PDO::FETCH_CLASS,Categorie::class);
        $req->execute(array($annee,$categorie,$annee,$categorie));
        $categories=$req->fetchAll();
        /*Recuperation DAO Cours*/
        $coursDao=DaoFactory::getInstanceDaoFactory()->getCoursDAO();
        /*Recup les cours donnee pour chaque categorie*/

        for($i=0;$i<count($categories);$i++){
            $cours=$coursDao->getListeAvecLigCommande($categories[$i]->getAnnee(),$categories[$i]->getCodeCategorie());
            $categories[$i]->setCours($cours);
        }

        return  $categories;
    }


}