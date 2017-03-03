<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 14-Jan-17
 * Time: 15:36
 */
class Cours
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var String
     */
    private $code;
    /**
     * @var String
     */
    private $nom;

    /**
     * @var String
     */
    private $description;
    /**
     * @var String
     */
    private $materiel;

    /**
     * @var String
     */
    private $prof;

    /**
     * @var Time
     */
    private $heureD;
    /**
     * @var Time
     */
    private $heureF;

    /**
     * @var String
     */
    private $jour;
    /**
     * @var array String
     */
    private $date=[];

    /**
     * @var array LigCommande
     */
    private $ligCommande;
    /**
     * @var double
     */
    private $prix;




    public function __construct($code=null, $nom=null, $description=null, $materiel=null, $prof=null, $heureD=null,$heureF=null, $jour=null, array $date=null, array $ligCommande=null, $prix=null,$id=null)
    {
        !is_null($id)?$this->id = $id:null;
        !is_null($code)?$this->code = $code:null;
        !is_null($nom)?$this->nom = $nom:null;
        !is_null($description)?$this->description = $description:null;
        !is_null($materiel)?$this->materiel = $materiel:null;
        !is_null($prof)?$this->prof = $prof:null;
        !is_null($heureD)?$this->heureD = $heureD:null;
        !is_null($heureF)?$this->heureF = $heureF:null;
        !is_null($jour)?$this->jour = $jour:null;
        !is_null($date)?$this->date = $date:null;
        !is_null($ligCommande)?$this->ligCommande = $ligCommande:null;
        !is_null($prix)?$this->prix = $prix:null;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return String
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param String $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return String
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param String $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param String $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return String
     */
    public function getMateriel()
    {
        return $this->materiel;
    }

    /**
     * @param String $materiel
     */
    public function setMateriel($materiel)
    {
        $this->materiel = $materiel;
    }

    /**
     * @return String
     */
    public function getProf()
    {
        return $this->prof;
    }

    /**
     * @param String $prof
     */
    public function setProf($prof)
    {
        $this->prof = $prof;
    }

    /**
     * @return Time
     */
    public function getHeureD()
    {
        return $this->heureD;
    }

    /**
     * @param Time $heureD
     */
    public function setHeureD($heureD)
    {
        $this->heureD = $heureD;
    }

    /**
     * @return Time
     */
    public function getHeureF()
    {
        return $this->heureF;
    }

    /**
     * @param Time $heureF
     */
    public function setHeureF($heureF)
    {
        $this->heureF = $heureF;
    }

    /**
     * @return String
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * @param String $jour
     */
    public function setJour($jour)
    {
        $this->jour = $jour;
    }

    /**
     * @return array
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param array $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return array
     */
    public function getLigCommande()
    {
        return $this->ligCommande;
    }

    /**
     * @param array $ligCommande
     */
    public function setLigCommande($ligCommande)
    {
        $this->ligCommande = $ligCommande;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }



}