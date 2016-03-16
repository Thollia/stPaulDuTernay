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
    /**
     * @var Simulation
     */
    private $simulation;

    public function setUp()
    {
        $sejour = new Sejour();
        $sejour->setMontantMBI(500);
        $this->simulation = new Simulation();
        $this->simulation->setInfoSejour($sejour);
    }

    public function build($nbEnf, $nbEnfPart, $QuotientFm){
        $this->setUp();
        $this->simulation->setNombreEnfant($nbEnf);
        $this->simulation->setNombreEnfantPartant($nbEnfPart);
        $this->simulation->setQuotientFamilial($QuotientFm);
    }

    public function tearDown()
    {

    }

    public function testReducNbEnfant2(){

        $this->build(2,1,450);

        $resultatAttenduSejour = 100;

        $this->simulation->calculReducEnfant();

        $this->assertEquals($resultatAttenduSejour, $this->simulation->getReducNombreEnfant());
    }

    public function testReducNbEnfant3(){

        $this->build(3,1,450);

        $resultatAttenduSejour = 200;

        $this->simulation->calculReducEnfant();

        $this->assertEquals($resultatAttenduSejour, $this->simulation->getReducNombreEnfant());
    }

    public function testReducNbEnfant1(){

        $this->build(1,1,450);

        $resultatAttenduSejour = 0;

        $this->simulation->calculReducEnfant();

        $this->assertEquals($resultatAttenduSejour, $this->simulation->getReducNombreEnfant());
    }

    public function testQuotientFamilialSup500(){

    }

    public function testQuotientFamilialInf500(){

    }

}
