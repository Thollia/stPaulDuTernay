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
        $this->build(1,1,550);

        $resultatAttenduSejour = 0;

        $this->simulation->calculReducQuotientFamilial();

        $this->assertEquals($resultatAttenduSejour, $this->simulation->getReducQuotientFamilial());
    }

    public function testQuotientFamilialInf500(){
        $this->build(1,1,450);

        $resultatAttenduSejour = 50;

        $this->simulation->calculReducQuotientFamilial();

        $this->assertEquals($resultatAttenduSejour, $this->simulation->getReducQuotientFamilial());
    }

    public function testSousTotal(){
        $this->build(1,1,450);
        $this->simulation->setReducQuotientFamilial(25);
        $this->simulation->setReducNombreEnfant(25);

        $resultatAttendu = 450;

        $this->simulation->calculSousTotal();

        $this->assertEquals($resultatAttendu, $this->simulation->getSousTotal());
    }

    public function testReducDepartUnEnfant(){
        $this->build(1,1,450);

        $this->simulation->setSousTotal(450);

        $resultatAttendu = 0;

        $this->simulation->calculDepartPlsEnfants();

        $this->assertEquals($resultatAttendu, $this->simulation->getReducDepartPlsEnfant());
    }

    public function testReducDepartPlusieursEnfant(){
        $this->build(1,2,450);

        $this->simulation->setSousTotal(450);

        $resultatAttendu = 45;

        $this->simulation->calculDepartPlsEnfants();

        $this->assertEquals($resultatAttendu, $this->simulation->getReducDepartPlsEnfant());
    }

    public function testPrixApresReduc(){
        $this->build(1,2,450);

        $this->simulation->setSousTotal(450);
        $this->simulation->setReducDepartPlsEnfant(45);

        $resultatAttendu = 405;

        $this->simulation->calculPrixApresReduction();

        $this->assertEquals($resultatAttendu, $this->simulation->getPrixApresReduction());
    }

    public function testPlafonnementSup100(){
        $this->build(1,2,450);

        $this->simulation->setPrixApresReduction(200);

        $resultatAttendu = 100;

        $this->simulation->calculNetAPayer();

        $this->assertEquals($resultatAttendu, $this->simulation->getNetAPayer());
    }

    public function testPlafonnementInf100(){
        $this->build(1,2,450);

        $this->simulation->setPrixApresReduction(90);

        $resultatAttendu = 90;

        $this->simulation->calculNetAPayer();

        $this->assertEquals($resultatAttendu, $this->simulation->getNetAPayer());
    }

    public function testTotalDepartUnEnfant(){
        $this->build(1,1,450);

        $this->simulation->setNetAPayer(90);

        $resultatAttendu = 90;

        $this->simulation->calculTotalDepartMultiple();

        $this->assertEquals($resultatAttendu, $this->simulation->getTotalDepartMultiple());
    }

    public function testTotalDepartDeuxEnfant(){
        $this->build(1,2,450);

        $this->simulation->setNetAPayer(90);

        $resultatAttendu = 180;

        $this->simulation->calculTotalDepartMultiple();

        $this->assertEquals($resultatAttendu, $this->simulation->getTotalDepartMultiple());
    }

    public function testUltimeUnEnfant(){
        $this->build(1,1,450);

        $resultatAttendu = 100;

        $this->simulation->calculTotal();

        $this->assertEquals($resultatAttendu, $this->simulation->getTotalDepartMultiple());
    }

    public function testUltimeDixEnfant(){
        $this->build(1,10,450);

        $resultatAttendu = 1000;

        $this->simulation->calculTotal();

        $this->assertEquals($resultatAttendu, $this->simulation->getTotalDepartMultiple());
    }

}
