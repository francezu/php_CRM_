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
                 echo '<li><i class="fa fa-dashboard"></i><a href="?page=atAndSt&type='.$_GET["type"].'&year='.$_GET["year"].'&ta=2"> Adults et Ados</a></li>';
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
/*Pour Chaque Cours nous créons un tableau avec ses participants*/
echo '<section class="row">';
for($i=0;$i<count($cours);$i++){
    /*ligne commande avec details commande et le participant*/
    $ligInscriptionCours=$cours[$i]->getLigInscriptionCours();

    /*2 article par ligne*/
    if($i%2==0 && $i!=0) {echo '</section><section class="row">';}
         echo '<article class="col-xs-12 col-lg-6">';
         echo '<div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped" id="table_'.$i.'">';
        echo '<h3 class="text-center" id="intitule_'.$i.'"><strong>'.$cours[$i]->getCode().'</strong> '.$cours[$i]->getNom().'</h3>';

        echo '<p class="text-right" style="color:red" id="heures_'.$i.'">'.$cours[$i]->getHeureD().' - '.$cours[$i]->getHeureF().'</p>';
        echo '<p class="text-left"  id="prof_'.$i.'">';
                                       foreach($cours[$i]->getProf() as $prof){
                                           echo $prof->getNom().' '.$prof->getPrenom().',';
                                       }
             echo '</p>';
        echo '<p class="text-right" style="color: red" id="dates_'.$i.'">';
                                        foreach ($cours[$i]->getDate() as $dates){
                                            echo $dates->getDescription().';<br/>';
                                        }
             echo '</p>';
        echo '<p><button type="button" class="btn btn-sm btn-info presence" id="$i">Presence</button>';
        echo ' <button type="button" class="btn btn-sm btn-primary PrintPDF" id="'.$i.'">PDF</button> ';
        echo ' <span style="color: blue" >Inscriptions : '.count($cours[$i]->getLigInscriptionCours()).'</span> ';
        echo ' <strong class="bg-info" > Participants :<span id="n_participants_'.$i.'"></span></strong></p>';



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

             /*On complete les lignes du tableau*/
            for($j=0;$j<count($ligInscriptionCours);$j++){
                                                           /*des couleurs en function de l'état du paiement*/
                            if($ligInscriptionCours[$j]-> getInscriptionCours()->getStatutPaiement()=='ok'||$ligInscriptionCours[$j]-> getInscriptionCours()->getStatutPaiement()=='online'){
                                                                              echo'<tr class="success" 
                                                                                       id="tr_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">';
                                                                              $divPanel='<div class="panel panel-green"  id="panel_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">';
                            }
                            else if($ligInscriptionCours[$j]-> getInscriptionCours()->getStatutPaiement()=='annule'){
                                                                              echo'<tr class="danger"  
                                                                                      id="tr_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">';
                                                                              $divPanel='<div class="panel panel-red"  id="panel_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">';
                            }
                            else if($ligInscriptionCours[$j]-> getInscriptionCours()->getStatutPaiement()=='okpv'){
                                                                              echo'<tr class="warning" 
                                                                                       id="tr_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">';
                                                                              $divPanel='<div class="panel panel-warning" id="panel_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">';
                            }
                            else{
                                                                              echo'<tr  id="tr_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">';
                                                                              $divPanel='<div class="panel panel-default"  id="panel_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">';
                            }


                            echo'<td><button type="button" 
                                             class="btn btn-primary btn-sm" 
                                             data-toggle="modal" 
                                             data-target="#'.$ligInscriptionCours[$j]->getParticipant()->getId().'"
                                             >'.$ligInscriptionCours[$j]->getParticipant()->getId().'</button>
                                 </td>';
                            echo '<td>'.date("d/m/Y", strtotime($ligInscriptionCours[$j]-> getInscriptionCours()->getDateInscrption())).'</td>';
                            echo '<td>'.$ligInscriptionCours[$j]->getParticipant()->getNom().'</td>';
                            echo '<td>'.$ligInscriptionCours[$j]->getParticipant()->getPrenom().'</td>';
                            echo '<td style="display: none">'.date("d/m/Y", strtotime($ligInscriptionCours[$j]->getParticipant()->getDateNaissance())).'</td>';
                            echo '<td style="display: none">'.$ligInscriptionCours[$j]->getParticipant()->getTel1().'</td>';
                            echo '<td style="display: none">'.$ligInscriptionCours[$j]->getParticipant()->getTel2().'</td>';
                            echo '<td style="display: none">'.$ligInscriptionCours[$j]->getParticipant()->getEmail().'</td>';
                            echo '<td style="display: none">'.$ligInscriptionCours[$j]->getParticipant()->getProfil()->getPhoto().'</td>';
                            echo '<td id="'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'"  class="edit_td">
                                      <span class="text" 
                                            id="span_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">'.$ligInscriptionCours[$j]-> getInscriptionCours()->getStatutPaiement().'</span>
                                      <select name="select"  
                                              style="display:none"  
                                              class="form-control editbox" 
                                              id="input_'.$ligInscriptionCours[$j]-> getInscriptionCours()->getId().'">
                                                     <option value=""></option>
                                                     <option class="bg-success" value="ok">ok</option> 
                                                     <option class="bg-success" value="online">online</option>
                                                     <option class="bg-warning" value="okpv">okpv</option>
                                                     <option class="bg-danger"  value="annule">annule</option>
                                      </select>
                                 </td>';

        /*Modale */
        echo '<div class="modal fade" id="'.$ligInscriptionCours[$j]->getParticipant()->getId().'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                    <h3 class="panel-title text-center">'.$ligInscriptionCours[$j]->getParticipant()->getId().' <strong>'
                                                                                         .$ligInscriptionCours[$j]->getParticipant()->getNom().' '
                                                                                         .$ligInscriptionCours[$j]->getParticipant()->getPrenom().'</strong></h3>
                                                </div>
                                                <div class="panel-body">
                                                        <p><strong>ID : </strong>' .$ligInscriptionCours[$j]->getParticipant()->getId(). '<p>
                                                        <p><strong>Date d\'inscription: </strong>' . date("d-m-Y", strtotime($ligInscriptionCours[$j]-> getInscriptionCours()->getDateInscrption())).'<p>
                                                        <p><strong>Nom : </strong>' .$ligInscriptionCours[$j]->getParticipant()->getNom().'<p>
                                                        <p><strong>Prenom : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getPrenom().'<p>
                                                        <p><strong>Date de naissance : </strong>'.date("d-m-Y", strtotime($ligInscriptionCours[$j]->getParticipant()->getDateNaissance())).'<p>';

                                     /*Si le Participant a un Responsable on affiche les champs*/
                                  if(!empty($ligInscriptionCours[$j]->getParticipant()->getResponsables())){
                                      for($z=0;$z<count($ligInscriptionCours[$j]->getParticipant()->getResponsables());$z++){

                                          echo         '<hr class="featurette-divider"/>
                                                        <p><strong>Nom Responsable: </strong>'.$ligInscriptionCours[$j]->getParticipant()->getResponsables()[$z]->getNom().'</p>
                                                        <p><strong>Prenom Responsable : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getResponsables()[$z]->getPrenom().'</p>
                                                        <p><strong>Adresse : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getResponsables()[$z]->getRueN().'</p>
                                                        <p><strong>Ville : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getResponsables()[$z]->getVille().'</p>
                                                        <p><strong>Code : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getResponsables()[$z]->getCode().'</p>
                                                        <p><strong>Tel : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getResponsables()[$z]->getTel1().'</p>
                                                        <p><strong>Tel2 : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getResponsables()[$z]->getTel2().'</p>
                                                        <p><strong>E-mail : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getResponsables()[$z]->getEmail().'</p>';
                                      }
                                  }
        echo                                           '<hr class="featurette-divider"/>
                                                        <p><strong>Message : </strong>'.$ligInscriptionCours[$j]-> getInscriptionCours()->getMsg().'</p>
                                                        <p><strong>Newsletter : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getProfil()->getNewsletter().'</p>
                                                        <p><strong>Photo : </strong>'.$ligInscriptionCours[$j]->getParticipant()->getProfil()->getPhoto().'</p>
                                                        <p><strong>Confirmation Paiement: </strong>'.$ligInscriptionCours[$j]-> getInscriptionCours()->getStatutPaiement().'</p>
                                                        <p><strong>Total : </strong>'.$ligInscriptionCours[$j]-> getInscriptionCours()->getTotal().'</p>
                                                        <p><strong>Modalité de paiement : </strong>' .$ligInscriptionCours[$j]-> getInscriptionCours()->isEtalmentPaiement(). '</p>
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
<script type="text/javascript">
    /*avoir le nb des tableaux*/
    var php_var = "<?php echo $i; ?>";
</script>
