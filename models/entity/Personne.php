<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 14-Jan-17
 * Time: 15:39
 */
abstract class Personne
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var String
     */
    protected $nom;
    /**
     * @var String
     */
    protected $prenom;
    /**
     * @var  String aaaa/mm/dd
     */

    protected $email;
    /**
     * @var  String rue et le numero
     */
    protected $rueN;
    /**
     * @var  String Ville
     */
    protected $ville;
    /**
     * @var   int
     */
    protected $code;

    /**
     * @var String
     */
    protected $pays;
    /**
     * @var  String car  +32....
     */
    protected $tel1;
    /**
     * @var String car  +32...
     */
    protected $tel2;


   public function __construct()
   {
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param String $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return String
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return String
     */
    public function getRueN()
    {
        return $this->rueN;
    }

    /**
     * @param String $rueN
     */
    public function setRueN($rueN)
    {
        $this->rueN = $rueN;
    }

    /**
     * @return String
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param String $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return String
     */
    public function getTel1()
    {
        return $this->tel1;
    }

    /**
     * @param String $tel
     */
    public function setTel1($tel1)
    {
        $this->tel1 = $tel1;
    }

    /**
     * @return String
     */
    public function getTel2()
    {
        return $this->tel2;
    }

    /**
     * @param String $fix
     */
    public function setTel2($tel2)
    {
        $this->tel2 = $tel2;
    }


}