<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 14-Mar-17
 * Time: 12:31
 */
/*recup Cours from obj*/
$cours=$objWhiteCours->getCours();
?>
<section class="row">
    <article class="col-xl-12 col-lg-12">
        <div class="jumbotron hero-spacer">
          <h2 class="pages-header text-center"><?php echo $anneeEtType instanceof Categorie?$anneeEtType->getNomCategorie():"Les Inscription n'ont pas commencé"?></h2>
        </div>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>
                <?php
                echo '<a href="?page=atAndSt&type='.$_GET["type"].'&year='.$_GET["year"].'">Tranche Age</a>';
                ?>
            </li>
            <?php
             if($objWhiteCours instanceof Categorie){
                 echo '<li><i class="fa fa-dashboard"></i><a href="?page=atAndSt&type='.$_GET["type"].'&year='.$_GET["year"].'&ta=2"> Sous Categories</a></li>';
             }
            ?>
            <li class="active"> <i class="fa fa-table"></i> Details Cours</li>
        </ol>
        <hr class="featurette-divider">
    </article>
</section>

<?php
echo '<section class="row">';
for($i=0;$i<count($cours);$i++){
    /*ligne commande avec details commande et le participant*/
    $ligCommande=$cours[$i]->getLigCommande();

    /*2 article par ligne*/
    if($i%2==0 && $i!=0) {echo '</section><section class="row">';}
         echo '<article class="col-xs-12 col-lg-6">';
      echo '<div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped" >';
        echo '<h3 class="text-center"><strong>'.$cours[$i]->getCode().'</strong> '.$cours[$i]->getNom().'</h3>';
        echo '<p class="text-right" style="color: red">'.$cours[$i]->getHeureD().' - '.$cours[$i]->getHeureF().'</p>';
        echo '<p class="text-left"  >'.$cours[$i]->getProf().'</p>';
        echo '<p class="text-right" style="color: red" id="jours">'.$cours[$i]->getJour().'</p>';
        echo '<p><button type="button" class="btn btn-sm btn-primary PrintButton" id="Print$j">Impresion</button>';
        echo ' <button type="button" class="btn btn-sm btn-info presence" id=.$j">Presence</button>';
        echo ' <button type="button" class="btn btn-sm btn-primary PrintPDF"    id="Print$j">PDF</button>   <strong style="color: blue">Inscriptions : '.count($cours[$i]->getLigCommande()).'</strong></p>';
             echo       '<thead>
                                   <tr>
                                    <th>ID</th>
                                    <th>Date_insc</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th style="display: none">Date_Naiss</th>
                                    <th style="display: none">Tel1</th>
                                    <th style="display: none">Tel2</th>
                                    <th style="display: none">E-mail</th>
                                    <th style="display: none">Photo</th>
                                    <th>Paiement</th>
                                  </tr>
                                </thead><tbody>';

            for($j=0;$j<count($ligCommande);$j++){
//                            if($obj_clients[$i]->getConfPaiement()=='ok'||$obj_clients[$i]->getConfPaiement()=='online'){echo'<tr class="success" >';$divPanel='<div class="panel panel-green">';}
//                            else if($obj_clients[$i]->getConfPaiement()=='annule'){echo'<tr class="danger" >';$divPanel='<div class="panel panel-red">';}
//                            else if($obj_clients[$i]->getConfPaiement()=='okpv'){echo'<tr class="warning" >';$divPanel='<div class="panel panel-warning">';}
//                            else{echo'<tr >';$divPanel='<div class="panel panel-default">';}
                            echo'<td><button type="button" class="btn btn-primary btn-sm" 
                                                                             data-toggle="modal" 
                                                                             data-target="#'.$ligCommande[$j]->getParticipant()->getId().'">'.$ligCommande[$j]->getParticipant()->getId().'</button></td>';
                            /* echo '<td data-toggle="modal" data-target="#'.$obj_clients[$i]->getId().'">'.$obj_clients[$i]->getId().'</td>';*/
                            echo '<td>'.date("d/m/Y", strtotime($ligCommande[$j]->getCommande()->getDateInscrption())).'</td>';
                            echo '<td>'.$ligCommande[$j]->getParticipant()->getNom().'</td>';
                            echo '<td>'.$ligCommande[$j]->getParticipant()->getPrenom().'</td>';
                            echo '<td style="display: none">'.date("d/m/Y", strtotime($ligCommande[$j]->getParticipant()->getDateNaissance())).'</td>';
                            echo '<td style="display: none">'.$ligCommande[$j]->getParticipant()->getTel1().'</td>';
                            echo '<td style="display: none">'.$ligCommande[$j]->getParticipant()->getTel2().'</td>';
                            echo '<td style="display: none">'.$ligCommande[$j]->getParticipant()->getEmail().'</td>';
                            echo '<td style="display: none">'.$ligCommande[$j]->getParticipant()->getProfil()->getPhoto().'</td>';
                            echo '<td>'.$ligCommande[$j]->getCommande()->getConfCommande().'</td>';
                            echo' </tr>';
             }

    echo '</tbody></table></div>';
    echo '</article>';

}
echo '</section>';

?>