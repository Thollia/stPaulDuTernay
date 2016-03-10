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
        $this->setUp(1, 'Classe de mer', 170, '2016-05-02', 10);

        $resultatAttendu = '2016-05-12';
        $resultatObserve = $this->object->getSejDteFin();

        $this->assertEquals($resultatAttendu, $resultatObserve);

    }


    public function testGetSejDteFormatFR() {

        $this->setUp(1, 'Classe de mer', 170, '2016-05-02', 10);

        $resultatAttendu = '04-11-2015';
        $resultatObserve = $this->object->getSejDteFormatFR('2015-11-04');

        $this->assertEquals($resultatAttendu, $resultatObserve);

    }


}
