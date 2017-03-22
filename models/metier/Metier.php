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


    /**
     * @param $annee
     * @param $type
     * @return Categorie avec SousCategorie
     */
    public function getCategorie($annee, $type){
        return $this->fabrique->getCategorieDAO()->getCategorieById($annee,$type);
    }


    /**
     * @param $annee
     * @param $categorie
     * @return  array Tranche avec les Cours
     */
    public function getCoursByTrancheAge($annee, $categorie)
    {
        $categorieDAO = $this->fabrique->getCategorieDAO();
        $cours = $categorieDAO->getListCoursByCategorie($annee, $categorie);
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