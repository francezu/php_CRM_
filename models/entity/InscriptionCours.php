<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 26-Jan-17
 * Time: 13:12
 */
class InscriptionCours extends Inscription
{
    /**
     * @var LigInscriptionCours
     */
    protected $ligInscriptionCours;

    /**
     * @var    bool
     */
    private $etalmentPaiement;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * InscriptionCours constructor.
     * @param int $id
     * @param Date $date
     * @param String $msg
     * @param float $total
     * @param bool $etalmentPaiement
     * @param bool $paiementOnline
     * @param String $confCommande
     * @param String $note
     * @param bool $garderie

    public function __construct($dateInscrption=null, $total=null, $etalmentPaiement=null, $paiementOnline=null, $msg=null, $statutPaiement=null, $note=null, $garderie=null,$id=null)
    {
        !is_null($etalmentPaiement)?$this->etalmentPaiement = $etalmentPaiement:null;
        parent::__construct($dateInscrption=null, $total=null, $paiementOnline=null, $msg=null, $statutPaiement=null, $note=null, $garderie=null,$id=null);
    }
     */
    /**
     * @return LigInscriptionCours
     */
    public function getLigInscriptionCours()
    {
        return $this->ligInscriptionCours;
    }

    /**
     * @param LigInscriptionCours $ligInscriptionCours
     */
    public function setLigInscriptionCours($ligInscriptionCours)
    {
        $this->ligInscriptionCours = $ligInscriptionCours;
    }

    /**
     * @return bool
     */
    public function isEtalmentPaiement()
    {
        return $this->etalmentPaiement;
    }

    /**
     * @param bool $etalmentPaiement
     */
    public function setEtalmentPaiement($etalmentPaiement)
    {
        $this->etalmentPaiement = $etalmentPaiement;
    }

    public function calcTotal(){
        $total=0;
        foreach ($this->ligInscriptionCours as $lig){
            $total+=$lig->getCours()->getPrix();
        }
        return $total;
    }



}