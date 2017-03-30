<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 21-Feb-17
 * Time: 11:22
 */
class LigInscriptionCours
{
    /**
     * @var InscriptionCours
     */
    private $inscriptionCours;
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
    public function __construct(InscriptionCours $inscriptionCours, $numLig, Participant $participant, $cours)
    {
        $this->inscriptionCours = $inscriptionCours;
        $this->numLig = $numLig;
        $this->participant = $participant;
        $this->cours = $cours;
    }

    /**
     * @return InscriptionCours
     */
    public function getInscriptionCours()
    {
        return $this->inscriptionCours;
    }

    /**
     * @param InscriptionCours $inscriptionCours
     */
    public function setInscriptionCours($inscriptionCours)
    {
        $this->inscriptionCours = $inscriptionCours;
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