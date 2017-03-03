<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 12-Jan-17
 * Time: 09:58
 */


?>
<section class="row">
    <article class="col-xs-12 col-lg-12">
        <h1 id="titre">Anniversaire creatifs</h1>
    </article>
</section>
<hr/>
<section class="row">
    <article class="col-xs-12 col-lg-12">
<?php
    echo '<div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="PDFtoPrint">';


    echo '<button type="button" class="btn btn-sm btn-primary PrintPDF" id="toPDF">PDF</button>   <strong style="color: blue"> Inscriptions : '.count($listeInscriptionAnniversaires).'</strong></p>';

    echo        '<thead>
                           <tr>
                                 <th>ID</th>
                                 <th>Date Inscription</th>
                                 <th>Nom Enfat</th>
                                 <th>Prenom Enfant</th> 
                                 <th>Naissance</th>
                                 
                                 <th>Nombre d\'enfants</th>
                                 <th>Age Moyenne</th>
                                 <th>Date souhaite</th>
                                 <th>Paiement</th>
                          </tr>
                            </thead><tbody>';
                for($i=0;$i<count($listeInscriptionAnniversaires);$i++){
                    /*pour chaque inscription on execute le code suivant
                     */
                    $inscription=$listeInscriptionAnniversaires[$i];

                    $participant=$inscription->getParticipant();
                    /*
                     * ici on a la posibiliter d'avoir plusieur responsable
                     * getResponsable() revoit un tableau des responsable
                     * */
                    $responsables=$participant->getResponsable();
                    $profil=$participant->getProfil();


                    /*Ici on definie la couleur  de la ligne en function de l'etat du paiement*/
                        if($inscription->getConfirmationPaiement()=='ok' || $inscription->getConfirmationPaiement()=='online'){
                                                echo'<tr class="success" >';
                                                $divPanel='<div class="panel panel-green">';
                        }else if($inscription->getConfirmationPaiement()=='annule'){
                                                echo'<tr class="danger" >';
                                                $divPanel='<div class="panel panel-red">';
                        }else if($inscription->getConfirmationPaiement()=='okpv'){
                                                echo'<tr class="warning" >';
                                                $divPanel='<div class="panel panel-warning">';
                        }else{
                            echo'<tr>';$divPanel='<div class="panel panel-default">';
                        }


                        /*
                         * Dans la premier colone on va insere le button pour afficher le ou les responsables
                         * */
                        echo'<td><button  type="button" 
                                          class="btn btn-primary btn-sm" 
                                          data-toggle="modal" 
                                          data-target="#'.$inscription->getId().'"
                                          >'.$inscription->getId().'</button>
                             </td>';
                        echo '<td>'.date("d/m/Y", strtotime($inscription->getDateInscription())).'</td>';
                        echo '<td>'.$participant->getNom().'</td>';
                        echo '<td>'.$participant->getPrenom().'</td>';
                        echo '<td>'.$participant->getDateNaissance().'</td>';

                        echo '<td>'.$inscription->getNbEnfants().'</td>';
                        echo '<td>'.$inscription->getAgeMayenne().'</td>';
                        echo '<td>'.date("d/m/Y", strtotime($inscription->getDateSouhaite())).'</td>';
                        echo '<td>'.$inscription->getConfirmationPaiement().'</td>';

                        echo' </tr>';

                    /*modale */
                    $modalitePaiement = $inscription->getModePaiement() == 0 ? "Je paye maintenant " : "Je paye par trimestre ( 3 x )";
                    echo '<!-- Modal -->
                                                             <div class="modal fade" id="' . $participant->getId() . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title text-center" id="myModalLabel">Fiche Client</h4>
                                                        </div>
                                                        <div class="modal-body">
                                        
                                        
                                                            <div class="row">
                                                                <div class="col-xs-12 col-lg-12">' . $divPanel .

                        '<div class="panel-heading">
                                                                            <h3 class="panel-title text-center">AC'.$participant->getId().' <strong>'.$participant->getNom().' '. $participant->getPrenom().'</strong></h3>
                                                                        </div>
                                                                        <div class="panel-body">
                                                                        <p><strong>ID : </strong>A' . $responsables[0]->getId() . '<p>
                                                                        <p><strong>Nom Responsable: </strong>' .$responsables[0]->getNom(). '</p>
                                                                        <p><strong>Prenom Responsable : </strong>' .$responsables[0]->getNom(). '</p>
                                                                        <p><strong>Adresse : </strong>' . $responsables[0]->getRueN(). '</p>
                                                                        <p><strong>Ville : </strong>' . $responsables[0]->getVille(). '</p>
                                                                        <p><strong>Code : </strong>' .$responsables[0]->getCode(). '</p>
                                                                        <p><strong>Tel : </strong>' . $responsables[0]->getTel(). '</p>
                                                                        <p><strong>Tel2 : </strong>' .$responsables[0]->getFix(). '</p>
                                                                        <p><strong>E-mail : </strong>' . $responsables[0]->getEmail().'</p>
                                                                        <p><strong>Message : </strong>' . $inscription->getMsg() . '</p>
                                                                        <p><strong>Newsletter : </strong>'.$profil->getNewsletter().'</p>
                                                                        <p><strong>Photo : </strong>'.$profil->getPhoto().'</p>
                                                                        <p><strong>Confirmation Paiement: </strong>'.$inscription->getConfirmationPaiement().'</p>
                                                                        <p><strong>Total : </strong>'.$inscription->getTotal().' €</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">ok</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                    }
?>
</tbody></table></div>
    </article>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        $('.PrintPDF').on('click',function(){
            /* we take the id of article */
            var id=$(this).attr('id');
            /* on recupere le HTML de l'id*/
            $(this).hide();/*cache le button impresion*/

            var table = document.getElementById('PDFtoPrint');/* on copie la table dans une variable*/
            console.log(table);
            var doc = new jsPDF('l', 'pt');

            var ateliers=$('#titre').text();

            doc.text(ateliers, 40, 40);

            var res = doc.autoTableHtmlToJson(table);
            doc.autoTable(res.columns, res.data,{startY: 120});
            doc.output("dataurlnewwindow");

            $(this).show();/* on affiche le button impression*/

        });
    });
</script>

