<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 26-Jan-17
 * Time: 13:12
 */
class InscriptionCours extends Inscription
{
    /**
     * @var Cours
     */
    protected $cours=[];

    /**
     * @return mixed
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * @param mixed $cours
     */
    public function setCours($cours)
    {
        $this->cours[] = $cours;
    }
}