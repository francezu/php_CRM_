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
       protected $fabrique;



      /*le constructeur definie le path ou se trouve les vue*/
       public function __construct() {
           $this->viewPath='views/pages/';
           $this->fabrique=\DaoFactory::getInstanceDaoFactory();

       }



       /* function qui recoit la vue a afficher et les variables */
        public function render($view,$datas=[]){
            if(isset($datas)){
               extract($datas);
            }
               require ($this->viewPath.$view.'.php');
        }

}