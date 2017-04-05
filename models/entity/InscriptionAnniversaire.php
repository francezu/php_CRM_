<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 26-Jan-17
 * Time: 11:32
 */
class InscriptionAnniversaire extends Inscription
{

    /**
     * @var
     */
    private $ageMayenne;
    /**
     * @var
     */
    private $nbEnfants;
    /**
     * @var
     */
    private $dateSouhaite;



    /**
     * InscriptionAnniversaire constructor.
     */
    public function __construct()
    {

        $this->setTotal(170);
    }


    /**
     * @return mixed
     */
    public function getAgeMayenne()
    {
        return $this->ageMayenne;
    }

    /**
     * @param mixed $ageMayenne
     */
    public function setAgeMayenne($ageMayenne)
    {
        $this->ageMayenne = $ageMayenne;
    }

    /**
     * @return mixed
     */
    public function getNbEnfants()
    {
        return $this->nbEnfants;
    }

    /**
     * @param mixed $nbEnfants
     */
    public function setNbEnfants($nbEnfants)
    {
        $this->nbEnfants = $nbEnfants;
    }

    /**
     * @return mixed
     */
    public function getDateSouhaite()
    {
        return $this->dateSouhaite;
    }

    /**
     * @param mixed $dateSouhaite
     */
    public function setDateSouhaite($dateSouhaite)
    {
        $this->dateSouhaite = $dateSouhaite;
    }
}