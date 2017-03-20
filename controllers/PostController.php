<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 04-Jan-17
 * Time: 11:11
 */

namespace Controller ;



class PostController extends AppController
{
    public function accueil(){
        $this->render('accueil');
    }

    public function ateliersAndStages(){
        $annee=$_GET["year"];
        $type=$_GET["type"];
        /*Recup details pour afficher les Titre dans les vues*/
        $anneeEtType=$this->metier->getCategorie($annee,$type);

        $trancheAge=$this->metier->getCoursByTrancheAge($annee,$type);

        if(isset($_GET['ta'])){
            if($_GET['ta'] == 2){/*trancheAge-1*/
                /*test l'existance des sous categorie*/
                if($this->metier->testSousCategorie($annee,$type)){
                    /*Recup Categories avec les Cours*/
                    $categories=$this->metier->getSousCategorieByYearAndTypeWhiteCours($annee,$type);
                    $this->render('sousCategorie',compact('categories','anneeEtType'));
                }else{
                    $objWhiteCours=$trancheAge[$_GET['ta']];
                    $this->render('coursDetails',compact('objWhiteCours','anneeEtType'));
                }
            }else{
                $objWhiteCours=$trancheAge[$_GET['ta']];
                $this->render('coursDetails',compact('objWhiteCours','anneeEtType'));
            }
        }else if(isset($_GET['sousCat'])){
            $categories=$this->metier->getSousCategorieByYearAndTypeWhiteCours($annee,$type);
            $objWhiteCours=$categories[$_GET['sousCat']];
            $this->render('coursDetails',compact('objWhiteCours','anneeEtType'));
        }else{
            $this->render('tranche',compact('trancheAge','anneeEtType'));
        }
    }

    public function preparts2016(){
    }
    public function  anniversaireCreatifs(){
    }
}