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
    public function getCoursByTrancheAge($annee, $type)
    {

        /*recup categorie avec Sous categorie et Cours ....*/
        $categorie=$this->getCategorie($annee, $type);


        /* liste avec les  Cours de chaque Categorie et SousCategorie*/
        $listCours=$categorie->getCours();
        if($categorie->getSousCategorie()!=null){
            for($i=0;$i<count($categorie->getSousCategorie());$i++){
                /*fusion array*/
                $listCours=array_merge($listCours,$categorie->getSousCategorie()[$i]->getCours());
            }
        }

        /*Les tranche d'age*/
        $trancheDAO = $this->fabrique->getTrancheDAO();
        $trancheAge = $trancheDAO->getListe();

        /*Rajout Cours pour chaque tranche d'age*/
        for ($j = 0; $j < count($trancheAge); $j++) {
            $tmp = [];
            for ($i = 0; $i < count($listCours); $i++) {
                if ($listCours[$i]->getTrancheAge() == $trancheAge[$j]->getId()) {
                    $tmp[] = $listCours[$i];
                }
            }
            $trancheAge[$j]->setCours($tmp);
            /* destruction de la variable*/
            unset($tmp);
        }
        return $trancheAge;
    }


    public function updateEtatPaiement($id,$etat){
     return $this->fabrique->getInscriptionCoursDAO()->updateEtatPaiement($id,$etat);
    }
}