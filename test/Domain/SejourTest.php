<?php
/**
 * Created by PhpStorm.
 * User: 14DUBREUILP
 * Date: 10/03/2016
 * Time: 10:52
 */

namespace stpaul\Domain;
require_once __DIR__.'/../../src/stpaul/Domain/Sejour.php';


class SejourTest extends \PHPUnit_Framework_TestCase {

    protected $object;
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Sejour();
        $this->object->setDateDebut('2016-05-02');
        $this->object->setDuree(10);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testDteFin()
    {
        $this->setUp();

        $resultatAttendu = '12/05/2016';
        $resultatObserve = $this->object->getSejDteFin();

        $this->assertEquals($resultatAttendu, $resultatObserve);

    }


    public function testGetSejDteFormatFR() {

        $this->setUp();

        $resultatAttendu = '02/05/2016';
        $resultatObserve = $this->object->getSejDteFormatFR();

        $this->assertEquals($resultatAttendu, $resultatObserve);

    }


}
