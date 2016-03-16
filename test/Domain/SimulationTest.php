<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 16/03/2016
 * Time: 08:16
 */

namespace stpaul\Domain;

require_once __DIR__.'/../../src/stpaul/Domain/Sejour.php';
require_once __DIR__.'/../../src/stpaul/IHM/Simulation.php';
use stpaul\IHM\Simulation;


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

    public function testReducNbEnfant(){

        $this->setUp();

        $resultatAttenduSejour1 = 100;
        $resultatAttenduSejour2 = 200;

        $this->simulation1->calculReducEnfant();
        $this->simulation2->calculReducEnfant();

        $this->assertEquals($resultatAttenduSejour1, $this->simulation1->getReducNombreEnfant());
        $this->assertEquals($resultatAttenduSejour2, $this->simulation2->getReducNombreEnfant());
    }

    public function testReducQuotientFamilial(){

        $this->setUp();

        $resultatAttenduSejour1 = 50;
        $resultatAttenduSejour2 = 0;

        $this->simulation1->calculReducQuotientFamilial();
        $this->simulation2->calculReducQuotientFamilial();

        $this->assertEquals($resultatAttenduSejour1, $this->simulation1->getReducQuotientFamilial());
        $this->assertEquals($resultatAttenduSejour2, $this->simulation2->getReducQuotientFamilial());

    }



}
