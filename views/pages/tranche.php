<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 14-Mar-17
 * Time: 12:31
 */

echo'<section class="row">
        <article class="col-xl-12 col-lg-12">
        <div class="jumbotron hero-spacer">
            <h2 class="pages-header text-center">'.($anneeEtType instanceof Categorie?$anneeEtType->getNomCategorie():"Les Inscription n'ont pas commencé").'</h2>
            </div>
            <ol class="breadcrumb">
              <li>
              <i class="fa fa-dashboard"></i>
                 Tranche Age
              </li>
            </ol>
            <hr class="featurette-divider">            
        </article>
</section>

<section class="row">';
for($i=0;$i<count($trancheAge);$i++){
    $cours=$trancheAge[$i]->getCours();

    $nbLigneParCategorie=0;
    for($j=0; $j<count($cours); $j++){
        /*compter le nombre des Lignes Client pour chaque cours*/
        $nbLigneParCategorie += count($cours[$j]->getLigCommande());
    }
    echo '<article class="col-xl-12 col-md-6 col-lg-4">
                <div class="col-lg-12 col-md-12">               
                   <div class="panel '.($trancheAge[$i]->getId()==1?"panel-red":($trancheAge[$i]->getId()==2?"panel-yellow":($trancheAge[$i]->getId()==4?"panel-green":"panel-primary"))).'">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                      <div class="huge">'. count($trancheAge[$i]->getCours()).'</div>
                                        <div>Cours </div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                      <div class="huge">'.$nbLigneParCategorie.'</div>
                                        <div>Inscriptions </div>
                                    </div>
                                </div>
                            </div>
                        <a href="?page=atAndSt&type='.$_GET["type"].'&year='.$_GET["year"].'&ta='.(array_search($trancheAge[$i],$trancheAge)).'">
                            <div class="panel-footer">
                                <span class="pull-left">'.$trancheAge[$i]->getNom().'</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>.
                </div>
        </article>';

}
?>