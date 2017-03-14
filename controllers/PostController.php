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

    }
    public function ateliers2016_2017(){
        if(isset($_GET['sort']) && $_GET['sort']=="cat"){
            $categories=$this->metier->getSousCategorieByYearAndTypeWhiteCours(2016,"AT");
            $this->render('sousCategorie',compact('categories'));
        }else if(isset($_GET['sort']) && $_GET['sort']=="details"){
            $this->render('coursDetails');
        }else{
            $trancheAge=$this->metier->getCoursByTrancheAge(2016,'AT');
            $this->render('tranche',compact('trancheAge'));
        }

    }

    public function preparts2016(){

    }
}