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
    public function anniversaireCreatifs(){
        /**
         * demander a la fabrique DAO de fabriquer un DAO pour Aniversaire creatifs
         */
        $inscriptionAnniversairesDAO=$this->fabrique->getInscriptionAnniversairesDAO();
        /*
         * Recuperation  des inscription avec les Participants  et les Responsables
         * */
        $listeInscriptionAnniversaires=$inscriptionAnniversairesDAO->getListe();

        $this->render('anniversaire_creatifs/anniversaire_creatifs',compact('listeInscriptionAnniversaires'));

    }
    public function ateliers2016_2017(){
        /*Recup de la fabrique DAO*/
        $categorieDAO=$this->fabrique->getCategorieDAO();
        $categories=$categorieDAO->getFromId(2016,"AT");

        $this->render('ateliers2016_2017/ateliers2016_2017',compact('categories'));
    }

    public function preparts2016(){

    }
}