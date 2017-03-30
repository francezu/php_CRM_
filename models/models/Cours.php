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
     * @var array
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
     * @var array Dates
     */
    private $date;

    /**
     * @var array LigCommande
     */
    private $ligInscriptionCours;
    /**
     * @var double
     */
    private $prix;


    /**
     * @var int
     */
    private $trancheAge;

    /**
     * @var String
     */
    private $categorieCours;



    public function __construct($code=null, $nom=null, $desc=null, $materiel=null, $prof=null, $hD=null,$hF=null, $j=null, array $date=null,$tAge=null,$catCours=null, array $ligInscCours=null, $prix=null,$id=null)
    {
        !is_null($id)?$this->id = $id:null;
        !is_null($code)?$this->code = $code:null;
        !is_null($nom)?$this->nom = $nom:null;
        !is_null($desc)?$this->description = $desc:null;
        !is_null($materiel)?$this->materiel = $materiel:null;
        !is_null($prof)?$this->prof = $prof:null;
        !is_null($hD)?$this->heureD = $hD:null;
        !is_null($hF)?$this->heureF = $hF:null;
        !is_null($j)?$this->jour = $j:null;
        !is_null($date)?$this->date = $date:null;
        !is_null($ligInscCours)?$this->ligInscriptionCours = $ligInscCours:null;
        !is_null($prix)?$this->prix = $prix:null;
        !is_null($tAge)?$this->trancheAge = $tAge:null;
        !is_null($catCours)?$this->categorieCours= $catCours:null;
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
     * @return array
     */
    public function getProf()
    {
        return $this->prof;
    }

    /**
     * @param array $prof
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
     * @return array Dates
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param array Dates
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return array
     */
    public function getLigInscriptionCours()
    {
        return $this->ligInscriptionCours;
    }

    /**
     * @param array $ligInscriptionCours
     */
    public function setLigInscriptionCours($ligInscriptionCours)
    {
        $this->ligInscriptionCours = $ligInscriptionCours;
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

    /**
     * @return int
     */
    public function getTrancheAge()
    {
        return $this->trancheAge;
    }

    /**
     * @param int $trancheAge
     */
    public function setTrancheAge($trancheAge)
    {
        $this->trancheAge = $trancheAge;
    }

    /**
     * @return String
     */
    public function getCategorieCours()
    {
        return $this->categorieCours;
    }

    /**
     * @param String $categorieCours
     */
    public function setCategorieCours($categorieCours)
    {
        $this->categorieCours = $categorieCours;
    }



}