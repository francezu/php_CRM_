<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 20-Feb-17
 * Time: 10:34
 */
class CategorieDao
{

    /**
     * @var PDO
     */
    private  $pdo;

    const sqlGetById="SELECT anneeCategorie as annee,
	                         idCategorie as codeCategorie,
                             nomCategorie as nomCategorie
                     FROM Categorie WHERE anneeCategorie=? AND idCategorie=? ;";

    const sqlGetSousCategories="SELECT s.anneeCategorie AS annee, s.idCategorie  AS codeCategorie, s.nomCategorie AS nomCategorie FROM Categorie s 
                                      inner join Categorie c 
                                       on s.FK_anneeCategorie=c.anneeCategorie and s.FK_idCategorie=c.idCategorie
                                  where c.anneeCategorie=? and c.idCategorie=? ;";

    const sqlInsert="";

    const sqlUpdate="";

    const sqlDeleteArt = "DELETE FROM Categorie where anneeCategorie=? AND  idCategorie=?";

    /**
     * DaoCategorie constructor.
     * @param $pdo
     */
    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    /**
     * @param $annee
     * @param $type
     * @return Categorie avec sousCategorie si existe
     */
    public function getCategorieById($annee, $type){
        /**
         * statement a execute sur la base de donnee
         */
        $req=$this->pdo->prepare(self::sqlGetById);
        /**
         * fetchAll() va nous renvoier les resultat sur forme d'un tableau
         * on peut preciser en parametre le syle de fetch que l'on veut pour nous comme on travail avec des objects c'est preferable que l'on recois des obj
         * pour ca il faut specifie en parametre PDO::FETCH_OBJ
         * PDO::FETCH_OBJ : retourne un objet anonyme avec les noms de propriétés qui correspondent aux noms des colonnes retournés dans le jeu de résultats
         * PDO::FETCH_CLASS et en seconde param a classe a charger
         */
        $req->setFetchMode(PDO::FETCH_CLASS,Categorie::class);
        /*les param */
        $req->execute(array($annee,$type));

        /*Si la Categorie n'existe pas nous créons une Exception*/
        try{
            /*recup reponse */
            $categorie=$req->fetch();
            /*SI il n'y a  pas de Categorie nous creons une Exception*/
            if($categorie==false){
                throw new Exception('La Categorie n\'existe pas');
            }

            $coursDao=DaoFactory::getInstanceDaoFactory()->getCoursDAO();
            $categorie->setCours($coursDao->getByIdCategorie($categorie->getAnnee(),$categorie->getCodeCategorie()));

            /*on test si SousCategorie n'est pas une Exeption*/
            $categorie->setSousCategorie($this->getSousCategorie($annee,$type) instanceof Exception ? null:$this->getSousCategorie($annee,$type));
            return $categorie;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    /**
     * @param $annee
     * @param $type
     * @return array SousCategorie|Exception en function de l'id compose de la Categorie
     */
    public function getSousCategorie($annee, $type){
        $req=$this->pdo->prepare(self::sqlGetSousCategories);
        $req->setFetchMode(PDO::FETCH_CLASS,Categorie::class);
        $req->execute(array($annee,$type));
        /*dans le cas ou il n'y a pas de sousCategorie on recoit array empty */
        $sousCategories=$req->fetchAll();

        /* On essaie de charger les cours de chaque sous categorie
        * Si il n'y a pas des SousCategorie nous creons une Exception
        */
        try{
            if(empty($sousCategories)){
                throw new Exception('Il n\'y a pas des sousCategorie');
            }
            $coursDao=DaoFactory::getInstanceDaoFactory()->getCoursDAO();
            /*Recup les Cours pour chaque SousCategorie*/
            for($i=0;$i<count($sousCategories);$i++){
                $cours=$coursDao->getByIdCategorie($sousCategories[$i]->getAnnee(),$sousCategories[$i]->getCodeCategorie());
                $sousCategories[$i]->setCours($cours);
            }
            return $sousCategories;
        }catch (Exception $e){
            return $e;
        }
    }


}