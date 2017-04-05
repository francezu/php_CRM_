<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 23-Mar-17
 * Time: 10:41
 */
class Prof
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
    private $prenom;

    /**
     * Prof constructor.
     * @param $id int
     * @param $nom string
     * @param $prenom string
     */
    public function __construct($nom=null,$prenom=null,$id=null)
    {
        !is_null($id)?$this->id = $id:null;
        !is_null($nom)?$this->nom = $nom:null;
        !is_null($prenom)?$this->prenom = $prenom:null;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }






}