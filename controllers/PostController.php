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
        /*Categorie avec SousCategorie et Cours*/
        $categorie=$this->metier->getCategorie($annee,$type);
        /*array d'obj TrancheAge avec Cours*/
        $trancheAge=$this->metier->getCoursByTrancheAge($annee,$type);

        if(isset($_GET['ta'])){
                                         /*test l'existance des sous categorie*/
                        if($_GET['ta'] == 2 && $categorie->getSousCategorie()!=null){/*trancheAge-1*/

                            $this->render('sousCategorie',compact('categorie'));

                        }else{

                                $objWhiteCours=$trancheAge[$_GET['ta']];
                                $this->render('coursDetails',compact('objWhiteCours','categorie'));

                        }

        }else if(isset($_GET['sousCat'])){
                                         /*recup une SousCategorie*/
                        $objWhiteCours= $categorie->getSousCategorie()[$_GET['sousCat']];
                        $this->render('coursDetails',compact('objWhiteCours','categorie'));
        }else{

                        $this->render('tranche',compact('trancheAge','categorie'));
        }
    }

    public function updateDataBase(){
        $id=$_POST['id'];
        $etat=$_POST['new_value'];
     echo  $this->metier->updateEtatPaiement($id,$etat);
    }

    public function preparts2016(){
    }
    public function  anniversaireCreatifs(){
    }
}