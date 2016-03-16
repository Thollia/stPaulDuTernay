<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 16/03/2016
 * Time: 08:16
 */

namespace stpaul\Domain;

use stpaul\IHM\Simulation;
use stpaul\Domain\Sejour;


class SimulationTest extends \PHPUnit_Framework_TestCase
{

    private $simulation1;
    private $simulation2;

    public function setUp()
    {
        $sejour = new Sejour();
        $sejour->setMontantMBI(500);
        $this->simulation1 = new Simulation();
        $this->simulation1->setInfoSejour($sejour);
        $this->simulation1->setNombreEnfant(2);
        $this->simulation1->setNombreEnfantPartant(2);
        $this->simulation1->setQuotientFamilial(450);
        $this->simulation2 = new Simulation();
        $this->simulation2->setInfoSejour($sejour);
        $this->simulation2->setNombreEnfant(4);
        $this->simulation2->setNombreEnfantPartant(1);
        $this->simulation2->setQuotientFamilial(550);

    }

    public function tearDown()
    {

    }




}
