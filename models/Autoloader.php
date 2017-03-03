<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 10-Jan-17
 * Time: 11:06
 */

/*j'ai cree une classe Autoloader car si j'utilise la function __autoload() dans l'index et quelque'un vouler fusioner mon projet avec le sien et qu il
aurait aussi un autoliading que ca ne genere pas un conflict*/
class Autoloader
{

    /* function offer par php qui nous permet  d'enregistre(ou declarée) notre function "autoload" comme function  autolading*/
    /*__CLASS__ ramplace par la class ou il se trouve*/
    /**
     *
     */
    static  function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }


    /* on la mait en static parce que on n'a pas besoin instancier notre class*/
    /* cette function va rechercher dans le fichier "*/

    /**
     * @param $class_name  string Nom de la class a rechercher dans le dossier
     */
    static function autoload($class_name){

        if(file_exists('models/'.$class_name.'.php')){
            require 'models/'.$class_name.'.php';
        }else{
            /**
             * avec scandir() on regarde dans le fichier
             * array_diff()supprime les elements que l'on lui donne dans le 2eme param
             */
            $files = array_diff(scandir('models'),array('..','.')) ;

            /**
             * on regarde dans chaque dossier qui est dans /models apres la class
             * si on la trouve on quite la boucle foreach avec le 'breack'
             */
            foreach ($files as $file){
                if(file_exists('models/'.$file.'/'.$class_name.'.php')){
                    require 'models/'.$file.'/'.$class_name.'.php';
                    break;
                }

            }

        }

    }



}

