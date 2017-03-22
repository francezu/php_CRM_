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
          <h2 class="pages-header text-center"><?php echo $categorie instanceof Categorie?$categorie->getNomCategorie():"Les Inscription n'ont pas commencé"?></h2>
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
                 echo '<li class="active"> <i class="fa fa-table"></i> '.$objWhiteCours->getNomCategorie().'</li>';
             }else{
                 echo '<li class="active"> <i class="fa fa-table"></i> '.$objWhiteCours->getNom().'</li>';
             }
            ?>

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
        echo '<p><button type="button" class="btn btn-sm btn-info presence" id=.$j">Presence</button>';
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
                /*des couleurs en function de l'etat du paiement*/
                            if($ligCommande[$j]->getCommande()->getConfCommande()=='ok'||$ligCommande[$j]->getCommande()->getConfCommande()=='online'){
                                                                              echo'<tr class="success" >';
                                                                              $divPanel='<div class="panel panel-green">';}
                            else if($ligCommande[$j]->getCommande()->getConfCommande()=='annule'){
                                                                              echo'<tr class="danger" >';
                                                                              $divPanel='<div class="panel panel-red">';}
                            else if($ligCommande[$j]->getCommande()->getConfCommande()=='okpv'){
                                                                              echo'<tr class="warning" >';
                                                                              $divPanel='<div class="panel panel-warning">';}
                            else{
                                 echo'<tr>';
                                 $divPanel='<div class="panel panel-default">';}


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

        /*modale */
        echo '<!-- Modal -->
                                <div class="modal fade" id="'.$ligCommande[$j]->getParticipant()->getId().'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="myModalLabel">Fiche Client</h4>
                                        </div>
                                        <div class="modal-body">
                        
   
                                            <div class="row">
                                                <div class="col-xs-12 col-lg-12">'.$divPanel.

                                                       '<div class="panel-heading">
                                                            <h3 class="panel-title text-center">'.$ligCommande[$j]->getParticipant()->getId().' <strong>'
                                                                                                 .$ligCommande[$j]->getParticipant()->getNom().' '
                                                                                                 .$ligCommande[$j]->getParticipant()->getPrenom().'</strong></h3>
                                                        </div>
                                                        <div class="panel-body">
                                                        <p><strong>ID : </strong>' .$ligCommande[$j]->getParticipant()->getId(). '<p>
                                                        <p><strong>Date d\'inscription: </strong>' . date("d-m-Y", strtotime($ligCommande[$j]->getCommande()->getDateInscrption())).'<p>
                                                        <p><strong>Nom : </strong>' .$ligCommande[$j]->getParticipant()->getNom().'<p>
                                                        <p><strong>Prenom : </strong>'.$ligCommande[$j]->getParticipant()->getPrenom().'<p>
                                                        <p><strong>Date de naissance : </strong>'.date("d-m-Y", strtotime($ligCommande[$j]->getParticipant()->getDateNaissance())).'<p>';

                                  if(!empty($ligCommande[$j]->getParticipant()->getResponsables()))   {

                                    echo               '<p><strong>Nom Responsable: </strong>'.$ligCommande[$j]->getParticipant()->getResponsables()[0]->getNom().'</p>
                                                        <p><strong>Prenom Responsable : </strong>'.$ligCommande[$j]->getParticipant()->getResponsables()[0]->getPrenom().'</p>
                                                        <p><strong>Adresse : </strong>'.$ligCommande[$j]->getParticipant()->getResponsables()[0]->getRueN().'</p>
                                                        <p><strong>Ville : </strong>'.$ligCommande[$j]->getParticipant()->getResponsables()[0]->getVille().'</p>
                                                        <p><strong>Code : </strong>'.$ligCommande[$j]->getParticipant()->getResponsables()[0]->getCode().'</p>
                                                        <p><strong>Tel : </strong>'.$ligCommande[$j]->getParticipant()->getResponsables()[0]->getTel1().'</p>
                                                        <p><strong>Tel2 : </strong>'.$ligCommande[$j]->getParticipant()->getResponsables()[0]->getTel2().'</p>
                                                        <p><strong>E-mail : </strong>'.$ligCommande[$j]->getParticipant()->getResponsables()[0]->getEmail().'</p>';

                                  }

          echo                                         '<p><strong>Message : </strong>'.$ligCommande[$j]->getCommande()->getMsg().'</p>
                                                        <p><strong>Newsletter : </strong>'.$ligCommande[$j]->getParticipant()->getProfil()->getNewsletter().'</p>
                                                        <p><strong>Photo : </strong>'.$ligCommande[$j]->getParticipant()->getProfil()->getPhoto().'</p>
                                                        <p><strong>Confirmation Paiement: </strong>'.$ligCommande[$j]->getCommande()->getConfCommande().'</p>
                                                        <p><strong>Total : </strong>'.$ligCommande[$j]->getCommande()->getTotal().'</p>
                                                        <p><strong>Modalité de paiement : </strong>' .$ligCommande[$j]->getCommande()->isEtalmentPaiement(). '</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">ok</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
    }

echo '</tbody></table></div>';
    echo '</article>';

}
echo '</section>';

?>