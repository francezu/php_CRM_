<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 23-Mar-17
 * Time: 10:41
 */
class Dates
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $description;


    /**
     * Dates constructor.
     * @param int $id
     * @param string $description
     */
    public function __construct($id=null, $description=null)
    {
        !is_null($id)?$this->id = $id:null;
        !is_null($description)?$this->description = $description:null;
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