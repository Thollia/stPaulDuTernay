<?php
/**
 * Created by PhpStorm.
 * User: 14DUBREUILP
 * Date: 14/03/2016
 * Time: 10:35
 */

namespace stpaul\IHM;


class Simulation {

    private $nomFamille;
    private $nombreEnfant;
    private $quotientFamilial;
    private $infoSejour;
    private $nombreEnfantPartant;

    private $reducQuotientFamilial;
    private $reducNombreEnfant;
    private $sousTotal;
    private $reducDepartPlsEnfant;
    private $prixApresReduction;
    private $plafond;
    private $netAPayer;
    private $totalDepartMultiple;

    function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getNomFamille()
    {
        return $this->nomFamille;
    }

    /**
     * @param mixed $nomFamille
     */
    public function setNomFamille($nomFamille)
    {
        $this->nomFamille = $nomFamille;
    }

    /**
     * @return mixed
     */
    public function getNombreEnfant()
    {
        return $this->nombreEnfant;
    }

    /**
     * @param mixed $nombreEnfant
     */
    public function setNombreEnfant($nombreEnfant)
    {
        $this->nombreEnfant = $nombreEnfant;
    }

    /**
     * @return mixed
     */
    public function getQuotientFamilial()
    {
        return $this->quotientFamilial;
    }

    /**
     * @param mixed $quotientFamilial
     */
    public function setQuotientFamilial($quotientFamilial)
    {
        $this->quotientFamilial = $quotientFamilial;
    }

    /**
     * @return mixed
     */
    public function getInfoSejour()
    {
        return $this->infoSejour;
    }

    /**
     * @param mixed $infoSejour
     */
    public function setInfoSejour($infoSejour)
    {
        $this->infoSejour = $infoSejour;
    }

    /**
     * @return mixed
     */
    public function getReducQuotientFamilial()
    {
        return $this->reducQuotientFamilial;
    }

    /**
     * @param mixed $reducQuotientFamilial
     */
    public function setReducQuotientFamilial($reducQuotientFamilial)
    {
        $this->reducQuotientFamilial = $reducQuotientFamilial;
    }

    /**
     * @return mixed
     */
    public function getReducNombreEnfant()
    {
        return $this->reducNombreEnfant;
    }

    /**
     * @param mixed $reducNombreEnfant
     */
    public function setReducNombreEnfant($reducNombreEnfant)
    {
        $this->reducNombreEnfant = $reducNombreEnfant;
    }

    /**
     * @return mixed
     */
    public function getSousTotal()
    {
        return $this->sousTotal;
    }

    /**
     * @param mixed $sousTotal
     */
    public function setSousTotal($sousTotal)
    {
        $this->sousTotal = $sousTotal;
    }

    /**
     * @return mixed
     */
    public function getReducDepartPlsEnfant()
    {
        return $this->reducDepartPlsEnfant;
    }

    /**
     * @param mixed $reducDepartPlsEnfant
     */
    public function setReducDepartPlsEnfant($reducDepartPlsEnfant)
    {
        $this->reducDepartPlsEnfant = $reducDepartPlsEnfant;
    }

    /**
     * @return mixed
     */
    public function getPrixApresReduction()
    {
        return $this->prixApresReduction;
    }

    /**
     * @param mixed $prixApresReduction
     */
    public function setPrixApresReduction($prixApresReduction)
    {
        $this->prixApresReduction = $prixApresReduction;
    }

    /**
     * @return mixed
     */
    public function getPlafond()
    {
        return $this->plafond;
    }

    /**
     * @param mixed $plafond
     */
    public function setPlafond($plafond)
    {
        $this->plafond = $plafond;
    }

    /**
     * @return mixed
     */
    public function getNetAPayer()
    {
        return $this->netAPayer;
    }

    /**
     * @param mixed $netAPayer
     */
    public function setNetAPayer($netAPayer)
    {
        $this->netAPayer = $netAPayer;
    }

    /**
     * @return mixed
     */
    public function getTotalDepartMultiple()
    {
        return $this->totalDepartMultiple;
    }

    /**
     * @param mixed $totalDepartMultiple
     */
    public function setTotalDepartMultiple($totalDepartMultiple)
    {
        $this->totalDepartMultiple = $totalDepartMultiple;
    }

    /**
     * @return mixed
     */
    public function getNombreEnfantPartant()
    {
        return $this->nombreEnfantPartant;
    }

    /**
     * @param mixed $nombreEnfantPartant
     */
    public function setNombreEnfantPartant($nombreEnfantPartant)
    {
        $this->nombreEnfantPartant = $nombreEnfantPartant;
    }


    private function calculReducQuotientFamilial()
    {
       if ($this->getQuotientFamilial() < 500){
           $this->setReducQuotientFamilial(0.1*$this->getInfoSejour()->getMontantMBI());
       } else {
           $this->setReducQuotientFamilial(0);
       }
    }


    private function calculSousTotal()
    {
       $this->setSousTotal($this->getInfoSejour()->getMontantMBI() - ($this->getReducQuotientFamilial() + $this->getReducNombreEnfant()));
    }


    private function calculDepartPlsEnfants()
    {
        if($this->getNombreEnfantPartant() > 1 ) {
            $this->setReducDepartPlsEnfant(0.1*$this->getSousTotal());
        } else{
            $this->setReducDepartPlsEnfant(0);
        }

    }


    private function calculNetAPayer ()
    {
        if($this->getPrixApresReduction() > 100 ){
            $this->setNetAPayer(100);
        } else {
            $this->setNetAPayer($this->getPrixApresReduction());
        }
    }
}