<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 16-Jan-17
 * Time: 10:26
 */
class Participant extends Personne
{
    /**
     * @var String F/M
     */
    private $sex;
    /**
     * @var format aaaa-mm-dd
     */
    private $dateNaissance;
    /**
     * @var  object Profil
     */
    private $profil;
    /**
     * @var  array object Responsable
     */
    private $responsables;



    public function __construct()
    {
        parent::__construct();
        /*pour respecte la composition*/
        $this->profil=new Profil(1,1);
    }


    /**
     * @return String
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param String $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return format
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param format $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return object
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * @param object $profil
     */
    public function setProfil(Profil $profil)
    {
        $this->profil = $profil;
    }

    /**
     * @return object
     */
    public function getResponsables()
    {
        return $this->responsables;
    }

    /**
     * @param array avec des Responsable
     */
    public function setResponsables($responsables)
    {
        $this->responsables = $responsables;
    }

    public function addResponsable(Responsable $respo){
        $this->responsables[]=$respo;
    }


}