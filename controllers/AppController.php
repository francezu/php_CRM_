<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 04-Jan-17
 * Time: 11:04
 */
namespace  Controller;



class AppController
{
       protected $viewPath;

       protected $metier;



      /*le constructeur definie le path ou se trouve les vue*/
       public function __construct() {
           /*On indique le PATH où sont le vues*/
           $this->viewPath='views/pages/';
           $this->metier= new \Metier();
       }



       /* function qui recoit la vue a afficher et les variables */
        public function render($view,$datas=[]){
            if(isset($datas)){
               extract($datas);
            }
               require ($this->viewPath.$view.'.php');
        }

}