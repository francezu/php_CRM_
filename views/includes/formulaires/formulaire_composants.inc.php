<?php
function nomPrenomParticipant(){
$nom_participant='<!-- Nom participant -->
                <div class="form-group has-feedback col-sm-12 col-lg-6 required" id="name-field">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="nom">Nom :</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="nome" type="text" 
                                       name="nomParticipant" 
                                       class="form-control" 
                                       placeholder="Indiquez votre nom"
                                       data-error="Indiquez votre nom. C\'est un champ obligatoire!" 
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>';
$prenom_participant=' <!-- Prenom participant -->
                <div class="form-group has-feedback col-sm-12 col-lg-6 required" id="name-field">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="prenome">Prénom :</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="prenome" type="text" 
                                       name="prenomParticipant" 
                                       class="form-control" 
                                       placeholder="Indiquez votre prénom" 
                                       data-error="Indiquez votre prénom. C\'est un champ obligatoire!" 
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>';

echo '<div class="row">'.$nom_participant.$prenom_participant.'</div>';
}
function dateNaissanceParticipant(){
    $date_naissance=' <!-- Date de naissance -->
            <div class="row">
                <div class="form-group has-feedback col-sm-12 col-lg-12">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="dateNaissance">Date de naissance:</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input id="dateNaissance" type="text" 
                                       name="dateNaissance" 
                                       class="form-control"  
                                       placeholder= "__/__/____" 
                                       data-error="Indiquez votre date de naissance. C\'est un champ obligatoire!" 
                                       data-minlength="10" 
                                       data-minlength-error="La date doit être au format jj/mm/aaaa" 
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            $(document).ready(function(){
                $("#dateNaissance").mask(\'AB/SZ/YYYY\', {
                    \'translation\': {
                        A: {
                            pattern: /[0-3]/
                        }
                        , B: {
                            pattern: /[0-9]/
                        }
                        , S: {
                            pattern: /[0-1]/
                        }
                        , Z: {
                            pattern: /[0-9]/
                        }
                        , Y: {
                            pattern: /[0-9]/
                        }
                    }
                });
                });
            </script>';
    echo $date_naissance;
}
function adresseParticipant(){
    $rue_numero='<!-- Adresse -->
                <div class="form-group has-feedback col-sm-12 col-lg-12">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="rueNumero">Adresse :</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input id="rueNumero" type="text" 
                                       name="rueNumero" 
                                       class="form-control" 
                                       placeholder="Indiquez rue et numero, ( boite postale )" 
                                       data-error="Indiquez votre Adresse. C\'est un champ obligatoire!" 
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>';
    $ville='<!-- Ville -->
                <div class="form-group has-feedback col-sm-12 col-lg-6">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="ville">Ville : </label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input id="ville" type="text" 
                                       name="ville" 
                                       class="form-control" 
                                       placeholder="Indiquez Ville" 
                                       data-error="Indiquez votre Ville. C\'est un champ obligatoire!" 
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>';
    $code=' <!-- Code postal -->
                <div class="form-group has-feedback col-sm-12 col-lg-6">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="code">Code postal : </label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input id="code" type="text" 
                                       name="code" 
                                       class="form-control"
                                       placeholder="Indiquez votre Code postal" 
                                       data-error="Indiquez Code postal. C\'est un champ obligatoire!" 
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <script>
                $(document).ready(function(){
                $("#code").mask("999999");
                });
                 </script>';
    echo '<div class="row">'.$rue_numero.'</div>'.'<div class="row">'. $ville.$code.'</div>';
}
function telParticipant(){
    
    
    $tel1='<!-- Téléphone -->
                <div class="form-group has-feedback col-sm-12 col-lg-6">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="tel">Téléphone : </label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input id="tel" type="tel" 
                                       name="tel" 
                                       class="form-control"  
                                       placeholder="Indiquez votre numéro de téléphone ou gsm." 
                                       pattern="[0-9.+()/ ]*" 
                                       data-minlength="8" 
                                       data-minlength-error="Le numéro de téléphone doit contenir au moins 8 caractères! " 
                                       data-error="Indiquez un numéro de téléphone correct!" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>';
    $tel2=' <!-- Téléphone 2 ( optionel ) -->
                <div class="form-group has-feedback col-sm-12 col-lg-6">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12" for="tel2">Téléphone 2 ( optionel ) :</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input id="tel2" type="tel" 
                                       name="tel2" 
                                       class="form-control"  
                                       placeholder="Indiquez votre numéro de téléphone ou gsm." 
                                       pattern="[0-9.+()/ ]*" 
                                       data-minlength="8" 
                                       data-minlength-error="Le numéro de téléphone doit contenir au moins 8 caractères! " 
                                       data-error="Indiquez un numéro de téléphone correct!">
                            </div>
                            <span class="glyphicon glyphicon-info-sign"></span><i> ( optionel ) </i>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>';
    echo '<div class="row">'.$tel1.$tel2.' </div>';
}
function nomPrenomResponsable(){
    
    $nom_responsable=' <!-- Nom Responsable -->
                <div class="form-group has-feedback col-sm-12 col-lg-6 " id="name-field">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 " for="nomResponsable">Nom Responsable :</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="nomResponsable" type="text" 
                                       name="nomResponsable" 
                                       class="form-control" 
                                       placeholder="Nom responsable">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="glyphicon glyphicon-info-sign"></span><i> Dans le cas d\'une inscription d\'un enfant âgé de - 16 ans.</i>
                        </div>
                    </div>
                </div>';
    $prenom_responsable='<!-- Prènom Responsable -->
                <div class="form-group has-feedback col-sm-12 col-lg-6 " id="name-field">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 " for="prenomResponsable">Prénom Responsable :</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="prenomResponsable" type="text" 
                                       name="prenomResponsable" 
                                       class="form-control" 
                                       placeholder="Prénom responsable">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                             <span class="glyphicon glyphicon-info-sign"></span><i> Dans le cas d\'une inscription d\'un enfant âgé de - 16 ans.</i>
                        </div>
                    </div>
                </div>';
    echo '<div class="row">'.  $nom_responsable. $prenom_responsable.'</div>';
    
}
function emailEmailConfirmation(){
    
    
    $email=' <!-- Adresse e-mail -->
                <div class="form-group has-feedback col-sm-12 col-lg-6 required" id="email-field">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="email" >Adresse e-mail:</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="email" type="email" name="email" class="form-control" placeholder="Indiquez votre adresse e-mail." pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" data-error="Indiquez une adresse e-mail. C\'est un champ obligatoire!" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>';
    $email_confirmation=' <!-- Confirmer l\'adresse e-mail -->
                <div class="form-group has-feedback col-sm-12 col-lg-6 required" id="email-field">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="confirmUserEmail">Confirmer l\'adresse e-mail:</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="confirmUserEmail" type="email" name="confirmUserEmail" class="form-control" placeholder="Indiquez votre adresse e-mail." pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" data-error="Indiquez une adresse e-mail valide. C\'est un champ obligatoire!" data-match="#email" data-match-error="L\'adresse e-mail n\'est pas identique" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>';
    echo '<div class="row">'. $email.$email_confirmation.'</div>';
}
function textarea(){
    $textarea='<div class="form-group col-sm-12 col-lg-12">
                    <label>Votre message :</label>
                    <textarea class="form-control" name="msg" rows="3"></textarea>
                </div>';
    echo '<div class="row">'.$textarea.' </div>';
}
function viePrive(){
    $newsletter='<div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="newsletter" value="1" /> &nbsp;Je souhaite recevoir la newsletter de Plateau96.
                                </label>
                            </div>
                        </div>
                    </div>';
    $photo='<div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="photo" value="1" /> &nbsp;Je souhaite que des photos de moi ou de mon travail soient utilisées par Plateau96 pour promouvoir ses ateliers.
                                </label>
                            </div>
                        </div>
                    </div>';
    $c_general='<div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="c_general" value="1" data-error="C\'est un champ obligatoire!" required> &nbsp;* J\'accepte les conditions générales rélatives aux inscription.
                                </label>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>';
    echo '<div class="row">'.$newsletter.$photo.$c_general.'</div>';
}
function buttonSubmitAnnuler(){
    $button_submit_annuler='<div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-danger pull-right" id="submit" type="submit" name="submit">Envoyer </button>
                            <button class="btn btn-default" type="reset">Annuler</button>
                        </div>
                    </div>';
    echo '<div class="row">'.$button_submit_annuler.'</div>';
};

/*pour les atelier prix supperieur a 350*/

function modePaiement($prix){
    $frais=($prix/100)*12;
  
    
    $mode_paiement='<label for=sex class="control-label col-xs-12 col-sm-12 col-lg-12 required">Mode de paiement :</label>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" 
                                           name="modePaiement"  
                                           value="0"
                                           data-error=" C\'est un champ obligatoire!"
                                           required> Je paye maintenant '.$prix.'€ pour l\'année (30 séances)
                                </label>
                            </div>
                        <div class="radio">
                                <label>
                                    <input type="radio" 
                                           name="modePaiement" 
                                           value="1" 
                                           data-error=" C\'est un champ obligatoire!"
                                           required> Je paye par trimestre (3 x '.round(($prix+$frais)/3).' € à l\'année, dont '.round(($prix+$frais)/3).' € à l\'inscription)
                                </label>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                   </div>';
    echo '<hr style="border-color:black;"><div class="row">'.$mode_paiement.'</div><hr style="border-color:black;">';
};
/*pour anniversaires creatifs*/
function sexEnfant(){
    $sex=' <label for=sex class="control-label col-xs-12 col-sm-12 col-lg-12 ">L\'enfant est :</label>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex"  value="m"required> Un garçon
                                </label>
                            </div>
                        
                    
                    
                        <div class="radio">
                            
                                <label>
                                    <input type="radio" name="sex" value="f" required> Une fille
                                </label>
                            </div>
                        </div>
                   </div>';
    echo '<div class="row">'.$sex.'</div';
}
function infoEnfantsParticipant(){
    $nombre_enfants=' <!-- Nombre d enfants--->
                <div class="form-group has-feedback col-sm-12 col-lg-6">
                        <div class="row">
                            <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="nbEnfants">Nombre d\'enfants : </label>
                            <div class="col-sm-12 col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-ice-lolly-tasted"></i></span>
                                    <input id="nbEnfants" type="number" 
                                           name="nbEnfants" 
                                           class="form-control" 
                                           placeholder="__" 
                                           data-error="Indiquez le nombre d\'enfants. C\'est un champ obligatoire!" 
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>';
    $age_moyenne=' <div class="form-group has-feedback col-sm-12 col-lg-6">
                        <div class="row">
                            <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="ageMoyenne">Age moyenne des enfants : </label>
                            <div class="col-sm-12 col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
                                    <input id="ageMoyenne" type="number" 
                                           name="ageMoyenne" 
                                           class="form-control" 
                                           placeholder="__" 
                                           data-error="Indiquez l\'age moyenne des enfants. C\'est un champ obligatoire!" 
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
             <script>
                  $(document).ready(function(){
                        $("#nbEnfants").mask("99");
                        $("#ageMoyenne").mask("99");
                   });
                </script>';
    echo ' <div class="row">'.$nombre_enfants. $age_moyenne.'</div>';
    
}
function dateSouhaitee(){
    $date_souhaitee='<div class="form-group has-feedback col-sm-12 col-lg-12">
                        <div class="row">
                            <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="dateSouhaite">Date(s) souhaitée(s) </label>
                            <div class="col-sm-12 col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input id="dateSouhaite" type="text" 
                                           name="dateSouhaite" 
                                           class="form-control" 
                                           placeholder="__/__/____" 
                                           data-error="C\'est un champ obligatoire!"
                                           data-minlength="10" 
                                           data-minlength-error="La date doit être au format jj/mm/aaaa" 
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
                       <script>
                     $(document).ready(function(){
                            $("#dateSouhaite").mask("AB/SZ/YYYY", {
                                \'translation\': {
                                    A: {
                                        pattern: /[0-3]/
                                    }
                                    , B: {
                                        pattern: /[0-9]/
                                    }
                                    , S: {
                                        pattern: /[0-1]/
                                    }
                                    , Z: {
                                        pattern: /[0-9]/
                                    }
                                    , Y: {
                                        pattern: /[0-9]/
                                    }
                                }
                            });
                      });
                </script>';
    echo '<div class="row">'.$date_souhaitee.'</div>';
}

/*preparts*/
function pays(){
    $pays='<!-- Pays participant -->
                <div class="form-group has-feedback col-sm-12 col-lg-6 required" id="name-field">
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-lg-12 required" for="nom">Pays :</label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input id="pays" type="text" 
                                       name="pays" 
                                       class="form-control" 
                                       placeholder="Indiquez pays"
                                       data-error="Indiquez pays. C\'est un champ obligatoire!" 
                                       required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>';
    echo '<div class="row">'.$pays.'</div>';
}
?>