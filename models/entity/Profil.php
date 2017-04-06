<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 14-Jan-17
 * Time: 17:14
 */
class Profil
{

    /*
     * @var int
     * */
    private $id;
    /**
     * @var  bool
     */
    private $newsletter;
    /**
     * @var bool
     */
    private $photo;



    /**
     * Profile constructor.
     * @param bool $newsletter
     * @param bool $photo
     */
    public function __construct($newsletter,$photo, $id=null)
    {
        /*comme en php il n'existe pas de surcharge d'operater pour pouvoir avoir plusieurs constructeurs*/
        /*pouvoir utilise le meme constructeur avec PDO et normalment*/
        //*si la variable est null on fait rien avec l'attribute*/
        $this->newsletter = $newsletter;
        $this->photo = $photo;
        $this->id=$id;
    }


    /**
     * @return int
     */
    public  function getId()
    {
        return $this->id;
    }

    public  function setId($id)
    {
        $this->id=$id;
    }

    /**
     * @return bool
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @param bool $newsletter
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return bool
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param bool $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }



}