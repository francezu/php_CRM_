<?php

/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 12-Jan-17
 * Time: 10:06
 */

class DaoFactory
{
    private $db_name;
    /**
     * @var string
     */
    private $db_user;
    /**
     * @var string
     */
    private $db_password;
    /**
     * @var string
     */
    private $db_host;

    /**
     * @var PDO
     */
    private  $pdo;

    /**
     * @var DaoFactory
     */
    private static $instance;

    /**
     * Database constructor.
     * @param $db_name  le nom de la base de donnee
     * @param string $db_user  le nom d'utilisateur
     * @param string $db_password mot de passe
     * @param string $db_host   l'ip ou est la base de donnee
     */

    public function __construct($db_name,$db_user='root',$db_password='',$db_host='locahost')
    {
        $this->db_name=$db_name;
        $this->db_user=$db_user;
        $this->db_password=$db_password;
        $this->db_host=$db_host;
    }


    /**
     * @return PDO instance de connection a la base de donnee
     */
    public  function getInstancePDO(){

        /*on test si le pdo n'est pas deja initialise*/
        if($this->pdo=== null){
            try{
                $pdo=new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset=utf8',$this->db_user,$this->db_password);
                /**
                 * on definie un attribut dans le PDO pour que si il y a une erreur que il l'affiche
                 * par default la valeur  du PDO::ATTR_ERRMODE=PDO::ERRMODE_SILENT
                 * setAttribute(key,value);
                 */
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }catch (Exception $e){
                die('Error : '.$e->getMessage());
            }
                $this->pdo=$pdo;
        }
        return $this->pdo;
     }

    /**
     * @return DaoFactory|instance un instance de l'objet lui mêmé
     *
     */
    public static function getInstanceDaoFactory(){
        /**
         * on test existance du DaoFactory si elle n'existe pas on la crée
         */
        if(self::$instance===null){
            /*lecture des  parametre de connection */
            $settings= require ('/config.php');
            /*on crée un obj dans l'attribut statique avec les parametre recuperé*/
            self::$instance  = new DaoFactory($settings['DB_NAME'],$settings['DB_USER'],$settings['DB_PASS'],$settings['DB_HOST']);
            /*initialisation du PDO dans l'objet*/
            self::$instance ->getInstancePDO();
        }
       return self::$instance ;
    }


    /**
     * @return InscriptionAnniversairesDAO avec PDO confiqure
     */
    public function getInscriptionAnniversairesDAO(){

        /**
         * injection de la dependence PDO
         */
        return new InscriptionAnniversairesDAO(self::getInstanceDaoFactory()->getInstancePDO());
    }

    /**
     * @return ParticipantDAO avec PDO confiqure
     */
    public function  getParticipantDAO(){
        /**
         * injection de la dependence Dpdo
         */
        return new ParticipantDao(self::getInstanceDaoFactory()->getInstancePDO());
    }
    /**
     * @return ResponsableDAO avec PDO confiqure
     */

    public function  getResponsableDAO(){
        /**
         * injection de la dependence Dpdo
         */
        return new ResponsableDao(self::getInstanceDaoFactory()->getInstancePDO());
    }

    /**
     * @return ProfileDAO avec PDO confiqure
     */
    public function getProfilDAO(){
        /**
         * injection de la dependence Dpdo
         */
        return new ProfilDAO(self::getInstanceDaoFactory()->getInstancePDO());
    }

    public function getCategorieDAO(){
        /**
         * injection de la dependence Dpdo
         */
        return new CategorieDao(self::getInstanceDaoFactory()->getInstancePDO());

    }
    public function getCoursDAO(){
        /**
         * injection de la dependence Dpdo
         */
        return new CoursDao(self::getInstanceDaoFactory()->getInstancePDO());

    }
    public function getLigCommandeDAO(){
        /**
         * injection de la dependence Dpdo
         */
        return new LigCommandeDao(self::getInstanceDaoFactory()->getInstancePDO());

    }
    public function getCommandeDAO(){
        /**
         * injection de la dependence Dpdo
         */
        return new CommandeDao(self::getInstanceDaoFactory()->getInstancePDO());

    }




}