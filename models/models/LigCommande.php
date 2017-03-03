<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 21-Feb-17
 * Time: 11:22
 */
class LigCommande
{
    /**
     * @var int
     */
    private $commande;
    /**
     * @var int
     */
    private $numLig;
    /**
     * @var Participant
     */
    private $participant;
    /**
     * @var int
     */
    private $cours;

    /**
     * LigCommande constructor.
     * @param int $commande
     * @param int $numLig
     * @param Participant $participant
     * @param int $cours
     */
    public function __construct(Commande $commande, $numLig, Participant $participant, $cours)
    {
        $this->commande = $commande;
        $this->numLig = $numLig;
        $this->participant = $participant;
        $this->cours = $cours;
    }


    /**
     * @return int
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param int $commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
    }

    /**
     * @return int
     */
    public function getNumLig()
    {
        return $this->numLig;
    }

    /**
     * @param int $numLig
     */
    public function setNumLig($numLig)
    {
        $this->numLig = $numLig;
    }

    /**
     * @return Participant
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * @param Participant $participant
     */
    public function setParticipant($participant)
    {
        $this->participant = $participant;
    }

    /**
     * @return int
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * @param int $cours
     */
    public function setCours($cours)
    {
        $this->cours = $cours;
    }



}