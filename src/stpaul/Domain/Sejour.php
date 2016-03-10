<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 07/03/2016
 * Time: 08:35
 */

namespace stpaul\Domain;


/**
 * Class Sejour
 * @package stpaul\Domain
 */
class Sejour {

    /**
     * @var string
     */
    private $numero = "";
    /**
     * @var string
     */
    private $intitule = "";
    /**
     * @var string
     */
    private $montantMBI = "";
    /**
     * @var string
     */
    private $dateDebut = "";
    /**
     * @var string
     */
    private $duree = "";


    public function __construct()
    {

    }



    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @param mixed $intitule
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }

    /**
     * @return mixed
     */
    public function getMontantMBI()
    {
        return $this->montantMBI;
    }

    /**
     * @param mixed $montantMBI
     */
    public function setMontantMBI($montantMBI)
    {
        $this->montantMBI = $montantMBI;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }


    /**
     * Retourne la date de fin de sejour
     * @return mixed
     */
    public function getSejDteFin()
    {
        $dateDebut = new \DateTime($this->getDateDebut());
        $dateDebut->add(new \DateInterval('P'.$this->getDuree().'D')) ;

        return $dateDebut->format('Y-m-d');
    }

    /**
     * Formatage jj-mm-aaaa
     * @param $pDte : date a formater
     * @return mixed
     */
    public function getSejDteFormatFR($pDte)
    {
        $date = new \DateTime($pDte);
        return $date->format('d-m-Y');
    }

}