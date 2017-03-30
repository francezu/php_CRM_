<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 14-Jan-17
 * Time: 15:33
 */
abstract class Inscription
{

    protected $nomForm;

    protected $ref;

    /**
     * @var int
     */
    protected $id;
    /**
     * @var  Date
     */
    protected $dateInscrption;
    /**
     * @var String
     */
    protected $msg;

    /**
     * @var bool
     */
    protected $paiementOnline;
    /**
     * @var   String
     */
    protected $statutPaiement;
    /**
     * @var String
     */
    protected $note;
    /**
     * @var bool
     */
    protected $garderie;

    /**
     * @var double
     */
    protected $total;




    /**
     * Inscription constructor.
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
    public function __construct($dateInscrption=null, $total=null, $paiementOnline=null, $msg=null, $statutPaiement=null, $note=null, $garderie=null,$id=null)
    {
        !is_null($id)?$this->id = $id:null;
        !is_null($dateInscrption)?$this->dateInscrption = $dateInscrption:null;
        !is_null($msg)?$this->msg = $msg:null;
        !is_null($total)?$this->total = $total:null;
        !is_null($paiementOnline)?$this->paiementOnline = $paiementOnline:null;
        !is_null($statutPaiement)?$this->statutPaiement = $statutPaiement:null;
        !is_null($note)?$this->note = $note:null;
        !is_null($garderie)?$this->garderie = $garderie:null;
    }

    /**
     * @return mixed
     */
    public function getNomForm()
    {
        return $this->nomForm;
    }

    /**
     * @param mixed $nomForm
     */
    public function setNomForm($nomForm)
    {
        $this->nomForm = $nomForm;
    }

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
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
     * @param Date $dateInscrption
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
    public function getStatutPaiement()
    {
        return $this->statutPaiement;
    }

    /**
     * @param String $statutPaiement
     */
    public function setStatutPaiement($statutPaiement)
    {
        $this->statutPaiement = $statutPaiement;
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








}