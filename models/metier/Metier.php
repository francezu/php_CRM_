<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 09-Mar-17
 * Time: 11:05
 */
class Metier
{
    protected $fabrique;


    public function __construct() {
        /*Recup la Fabrique DAO*/
        $this->fabrique=\DaoFactory::getInstanceDaoFactory();
    }

    public function getSousCategorieByYearAndTypeWhiteCours($annee,$categorie){
        /*Recup CategorieDAO pour travailler avec la class Categorie*/
        $categorieDAO=$this->fabrique->getCategorieDAO();
        $categories=$categorieDAO->getCoursBySousCategorie($annee,$categorie);
        return $categories;
    }

    public function getCoursByTrancheAge($annee,$categorie)
    {
        $categorieDAO = $this->fabrique->getCategorieDAO();
        $cours = $categorieDAO->getAllCoursByTypeAndYear($annee, $categorie);
        $trancheDAO = $this->fabrique->getTrancheDAO();
        $trancheAge = $trancheDAO->getListe();

        for ($j = 0; $j < count($trancheAge); $j++) {
            $tmp = [];
            for ($i = 0; $i < count($cours); $i++) {
                if ($cours[$i]->getTrancheAge() == $trancheAge[$j]->getId()) {
                    $tmp[] = $cours[$i];
                }
            }
            $trancheAge[$j]->setCours($tmp);

            unset($tmp);
        }
        return $trancheAge;
    }

}