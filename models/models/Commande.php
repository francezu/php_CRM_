<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 22-Feb-17
 * Time: 10:02
 */
class Commande
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var  Date
     */
    private $dateInscrption;
    /**
     * @var String
     */
    private $msg;
    /**
     * @var  double
     */
    private $total;
    /**
     * @var    bool
     */
    private $etalmentPaiement;
    /**
     * @var bool
     */
    private $paiementOnline;
    /**
     * @var   String
     */
    private $confCommande;
    /**
     * @var String
     */
    private $note;
    /**
     * @var bool
     */
    private $garderie;

    /**
     * Commande constructor.
     * @param int $id
     * @param Date $date
     * @param String $msg
     * @param float $total
     * @param bool $etalmentPaiement
     * @param bool $paiementOnline
     * @param String $confCommande
     * @param String $note
     * @param bool $garderie
     */
    public function __construct($dateInscrption=null, $total=null, $etalmentPaiement=null, $paiementOnline=null, $msg=null, $confCommande=null, $note=null, $garderie=null,$id=null)
    {
        !is_null($id)?$this->id = $id:null;
        !is_null($dateInscrption)?$this->dateInscrption = $dateInscrption:null;
        !is_null($msg)?$this->msg = $msg:null;
        !is_null($total)?$this->total = $total:null;
        !is_null($etalmentPaiement)?$this->etalmentPaiement = $etalmentPaiement:null;
        !is_null($paiementOnline)?$this->paiementOnline = $paiementOnline:null;
        !is_null($confCommande)?$this->confCommande = $confCommande:null;
        !is_null($note)?$this->note = $note:null;
        !is_null($garderie)?$this->garderie = $garderie:null;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Date
     */
    public function getDateInscrption()
    {
        return $this->dateInscrption;
    }

    /**
     * @param Date $date
     */
    public function setDateInscrption($dateInscrption)
    {
        $this->dateInscrption = $dateInscrption;
    }

    /**
     * @return String
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param String $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
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

    /**
     * @return bool
     */
    public function isPaiementOnline()
    {
        return $this->paiementOnline;
    }

    /**
     * @param bool $paiementOnline
     */
    public function setPaiementOnline($paiementOnline)
    {
        $this->paiementOnline = $paiementOnline;
    }

    /**
     * @return String
     */
    public function getConfCommande()
    {
        return $this->confCommande;
    }

    /**
     * @param String $confCommande
     */
    public function setConfCommande($confCommande)
    {
        $this->confCommande = $confCommande;
    }

    /**
     * @return String
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param String $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return bool
     */
    public function isGarderie()
    {
        return $this->garderie;
    }

    /**
     * @param bool $garderie
     */
    public function setGarderie($garderie)
    {
        $this->garderie = $garderie;
    }






}