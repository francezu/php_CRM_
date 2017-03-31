<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 30-Mar-17
 * Time: 12:54
 */
interface IDaoFactory
{
    public function getInstancePDO();
    public static function getInstanceDaoFactory();

    public function getInscriptionAnniversairesDAO();
    public function getParticipantDAO();
    public function getResponsableDAO();
    public function getProfilDAO();
    public function getCategorieDAO();
    public function getCoursDAO();
    public function getLigInscriptionCoursDAO();
    public function getInscriptionCoursDAO();
    public function getTrancheDAO();
    public function getProfDAO();
    public function getDatesDAO();
}