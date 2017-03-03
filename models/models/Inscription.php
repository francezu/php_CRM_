<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 14-Jan-17
 * Time: 15:33
 */
abstract class Inscription
{

    /**
     * @var
     */
    protected $nomForm;
    /**
     * @var
     */
    protected $ref;
    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $dateInscription;
    /**
     * @var
     */
    protected $msg;
    /**
     * @var
     */
    private $total;
    /**
     * @var
     */
    protected $modePaiement;




    /**
     * @var
     */
    private $garderie;
    /**
     * @var
     */
    protected $confirmationPaiement;
    /**
     * @var
     */
    private $note;
    /**
     * @var Participant
     */
    private $participant;

    /**
     * Inscription constructor.
     */
    public function __construct()
    {
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * @param mixed $dateInscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getModePaiement()
    {
        return $this->modePaiement;
    }

    /**
     * @param mixed $modePaiement
     */
    public function setModePaiement($modePaiement)
    {
        $this->modePaiement = $modePaiement;
    }
    /**
     * @return mixed
     */
    public function getGarderie()
    {
        return $this->garderie;
    }

    /**
     * @param mixed $garderie
     */
    public function setGarderie($garderie)
    {
        $this->garderie = $garderie;
    }

    /**
     * @return mixed
     */
    public function getConfirmationPaiement()
    {
        return $this->confirmationPaiement;
    }

    /**
     * @param mixed $confirmationPaiement
     */
    public function setConfirmationPaiement($confirmationPaiement)
    {
        $this->confirmationPaiement = $confirmationPaiement;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * @param mixed $participant
     */
    public function setParticipant(Participant $participant)
    {
        $this->participant = $participant;
    }





}