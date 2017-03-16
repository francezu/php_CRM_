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

    public function ateliers2015_2016(){

        $annee=2015;
        $type="AT";
        $trancheAge=$this->metier->getCoursByTrancheAge($annee,$type);
        if(isset($_GET['ta'])){
            if($_GET['ta'] == 2){/*trancheAge-1*/
                /*test l'existance des sous categorie*/
                if($this->metier->testSousCategorie($annee,"AT")){
                    /*Recup Categories avec les Cours*/
                    $categories=$this->metier->getSousCategorieByYearAndTypeWhiteCours($annee,$type);
                    $this->render('sousCategorie',compact('categories'));
                }else{
                    $cours=$trancheAge[$_GET['ta']];
                    $this->render('coursDetails',compact('cours'));
                }
            }else{
                $cours=$trancheAge[$_GET['ta']];
                $this->render('coursDetails',compact('cours'));
            }
        }else if(isset($_GET['sousCat'])){
            $categories=$this->metier->getSousCategorieByYearAndTypeWhiteCours($annee,$type);
            $cours=$categories[$_GET['sousCat']];
            $this->render('coursDetails',compact('cours'));
        }else{
            $this->render('tranche',compact('trancheAge'));
        }
    }
    public function ateliers2016_2017(){
        $annee=2016;
        $type="AT";
        $trancheAge=$this->metier->getCoursByTrancheAge($annee,$type);
        if(isset($_GET['ta'])){
                        if($_GET['ta'] == 2){/*trancheAge-1*/
                                            /*test l'existance des sous categorie*/
                                            if($this->metier->testSousCategorie($annee,"AT")){
                                                        /*Recup Categories avec les Cours*/
                                                        $categories=$this->metier->getSousCategorieByYearAndTypeWhiteCours($annee,$type);
                                                        $this->render('sousCategorie',compact('categories'));
                                            }else{
                                                        $cours=$trancheAge[$_GET['ta']];
                                                        $this->render('coursDetails',compact('cours'));
                                            }
                        }else{
                                            $cours=$trancheAge[$_GET['ta']];
                                            $this->render('coursDetails',compact('cours'));
                        }
        }else if(isset($_GET['sousCat'])){
                        $categories=$this->metier->getSousCategorieByYearAndTypeWhiteCours($annee,$type);
                        $cours=$categories[$_GET['sousCat']];
                        $this->render('coursDetails',compact('cours'));
        }else{
                        $this->render('tranche',compact('trancheAge'));
        }
    }

    public function preparts2016(){

    }
}