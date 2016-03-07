<?php

function getDB(){
    return new PDO('mysql:host=localhost;dbname=bdstpaul;charset=utf8', 'root');
}

function getSejour()
{
    return getDB()->query('select * from sejour order by sejno');

}

class Sejour {

    private $numero = "";
    private $intitule = "";
    private $montantMBI = "";
    private $dateDebut = "";
    private $duree = "";

    /**
     * Sejour constructor.
     * @param $intitule
     * @param $montantMBI
     * @param $dateDebut
     * @param $duree
     */
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

}


?>
