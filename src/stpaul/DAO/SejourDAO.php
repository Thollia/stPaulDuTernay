<?php
/**
 * Created by PhpStorm.
 * User: 14DUBREUILP
 * Date: 07/03/2016
 * Time: 08:54
 */

namespace stpaul\DAO;

use Doctrine\DBAL\Connection;
use stpaul\Domain\Sejour;

/**
 * Class SejourDAO
 * @package stpaul\DAO
 */
class SejourDAO {

    /** @var Connection  */
    private $db;

    /**
     * @param Connection $db
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function findAll() {
        $sql = "select * from sejour order by sejno";
        $result = $this->db->fetchAll($sql);

        $sejours = array();
        foreach ($result as $row) {
            $sejourId = $row['SEJNO'];
            $sejours[$sejourId] = $this->buildSejour($row);
        }
        return $sejours;
    }

    public function findAllDict(){
        $sql = "select * from sejour order by sejno";
        $result = $this->db->fetchAll($sql);

        $sejours = [];
        foreach ($result as $row) {
            $sejours[$row['SEJNO']] = $row["SEJINTITULE"];
        }
        return $sejours;
    }

    /**
     * @param array $row
     * @return Sejour
     */
    private function buildSejour(array $row) {
        $sejour = new Sejour();
        $sejour->setDateDebut($row['SEJDTEDEB']);
        $sejour->setDuree($row["SEJDUREE"]);
        $sejour->setIntitule($row["SEJINTITULE"]);
        $sejour->setMontantMBI($row["SEJMONTANTMBI"]);
        $sejour->setNumero($row["SEJNO"]);

        return $sejour;
    }
}