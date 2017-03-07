<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 07-Mar-17
 * Time: 11:51
 */
class Tranche
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nom;
    /**
     * @var string
     */
    private $description;

    /**
     * Tranche constructor.
     * @param int $id
     * @param string $nom
     * @param string $description
     */
    public function __construct($id, $nom,$cours=null, $description=null)
    {
        !is_null($cours)?$this->cours = $cours:null;
        !is_null($id)?$this->id = $id:null;
        !is_null($nom)?$this->nom = $nom:null;
        !is_null($description)?$this->description = $description:null;
    }
    /**
     * @var Cours
     */
    private $cours;

    /**
     * @return Cours
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * @param Cours $cours
     */
    public function setCours($cours)
    {
        $this->cours = $cours;
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
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



}