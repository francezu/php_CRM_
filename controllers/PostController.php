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

        $categories=$this->metier->getSousCategorieByYearAndTypeWhiteCours(2016,"AT");
        $trancheAge=$this->metier->getCoursByTrancheAge(2016,'AT');
        $this->render('ateliers2016_2017/ateliers2016_2017',compact('categories','trancheAge'));
    }

    public function preparts2016(){

    }
}