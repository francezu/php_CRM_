<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 11-Jan-17
 * Time: 10:34
 */
require_once('models/Autoloader.php');
Autoloader::register();

require_once ('controllers/AppController.php');
require_once ('controllers/PostController.php');
use Controller\PostController;

/**
 * Comme php ne me permet pas de execute un require() et de sauvgarder  le resultat on est oblige d'utiliser  ob_start() qui dit que tous qui sera affiche va etre
 * stoker dans une variable.
 * avec ob_get_clean() le resultat on le stock dans $content;
 * link : https://www.grafikart.fr/formations/programmation-objet-php/tp-structure
 */

if(!isset($_GET['pages'])){
    $page="accueil";
}else{
    $page=$_GET['pages'];
}

$ctr=new Controller\PostController();
ob_start();
switch ($page){
    case ("accueil"):{
       $ctr->accueil();
        break;
    }
    case("anniversaire_creatifs/anniversaire_creatifs"):{
        $ctr->anniversaireCreatifs();
        break;
    }
    case("ateliers2016_2017"):{

        $ctr->ateliers2016_2017();
        break;
    }
    default:{
        $ctr->accueil();
        break;
    }
}
$content=ob_get_clean();


/**
 * le $content on va l'afficher dans le template
 */
require('views/templates/default.php');


?>