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

    const sqlGetByYearAndType="SELECT anneeCategorie AS annee, idCategorie AS codeCategorie, nomCategorie AS nomCategorie FROM Categorie cat
                                     where cat.anneeCategorie=? and cat.idCategorie=?
                              UNION 
                              SELECT s.anneeCategorie AS annee, s.idCategorie  AS codeCategorie, s.nomCategorie AS nomCategorie FROM Categorie s 
                                    inner join Categorie c 
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
        return $categories;
    }

    /**
     * @param $id Participant
     * @return array Cours avec LigCommande,Commande,Participant
     */
    public  function getAllCoursByTypeAndYear($annee,$categorie){
        $req=$this->pdo->prepare(self::sqlGetByYearAndType);
        $req->setFetchMode(PDO::FETCH_CLASS,Categorie::class);
        $req->execute(array($annee,$categorie,$annee,$categorie));
        $categories=$req->fetchAll();


        $coursDao=DaoFactory::getInstanceDaoFactory()->getCoursDAO();
        $listeCours=[];


        for($i=0;$i<count($categories);$i++){
            $coursCat=$coursDao->getAllCoursByYearAndTypeWhiteLigCommande($categories[$i]->getAnnee(),$categories[$i]->getCodeCategorie());
            /*fusion array Cours de la Categorie Precendente*/
            $listeCours=array_merge($listeCours,$coursCat);
        }

        return  $listeCours;
    }


    public  function getCoursBySousCategorie($annee,$categorie){
        $req=$this->pdo->prepare(self::sqlGetByYearAndType);
        $req->setFetchMode(PDO::FETCH_CLASS,Categorie::class);
        $req->execute(array($annee,$categorie,$annee,$categorie));
        $categories=$req->fetchAll();

        /*Recup DAO Cours*/
        $coursDao=DaoFactory::getInstanceDaoFactory()->getCoursDAO();

        /*Recup les Cours pour chaque SousCategorie*/
        for($i=0;$i<count($categories);$i++){
            $cours=$coursDao->getAllCoursByYearAndTypeWhiteLigCommande($categories[$i]->getAnnee(),$categories[$i]->getCodeCategorie());
            $categories[$i]->setCours($cours);
        }

        return  $categories;
    }


}