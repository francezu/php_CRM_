<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 17-Feb-17
 * Time: 12:23
 */
class Categorie
{
    /**
     * @var int
     */
    private $annee;
    /**
     * @var String
     */
    private $codeCategorie;
    /**
     * @var String
     */
    private $nomCategorie;
    /**
     * @var array Cours
     */
    private $cours;

    /**
     * @var array Categorie
     */
    private $sousCategorie;

    /**
     * Categorie constructor.
     * @param int $annee
     * @param String $codeCategorie
     * @param String $nomCategorie
     * @param array $cours
     */
    public function __construct($annee=null, $codeCategorie=null, $nomCategorie=null, array $cours=null,array $sousCategorie=null)
    {
        !is_null($annee)?$this->annee = $annee:null;
        !is_null($codeCategorie)?$this->codeCategorie = $codeCategorie:null;
        !is_null($nomCategorie)?$this->nomCategorie = $nomCategorie:null;
        !is_null($sousCategorie)?$this->sousCategorie=$sousCategorie:null;
        !is_null($cours)?$this->cours = $cours:null;
    }


    /**
     * @return int
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * @param int $annee
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }

    /**
     * @return String
     */
    public function getCodeCategorie()
    {
        return $this->codeCategorie;
    }

    /**
     * @param String $codeCategorie
     */
    public function setCodeCategorie($codeCategorie)
    {
        $this->codeCategorie = $codeCategorie;
    }

    /**
     * @return String
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }

    /**
     * @param String $nomCategorie
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;
    }

    /**
     * @return array
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * @param array $cours
     */
    public function setCours($cours)
    {
        $this->cours = $cours;
    }

    /**
     * @return array
     */
    public function getSousCategorie()
    {
        return $this->sousCategorie;
    }

    /**
     * @param array $sousCategorie
     */
    public function setSousCategorie($sousCategorie)
    {
        $this->sousCategorie = $sousCategorie;
    }





}