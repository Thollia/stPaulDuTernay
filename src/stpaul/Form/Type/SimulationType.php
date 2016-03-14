<?php
/**
 * Created by PhpStorm.
 * User: 14DUBREUILP
 * Date: 14/03/2016
 * Time: 10:37
 */

namespace stpaul\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class SimulationType extends AbstractType{


    private $customValues;
    /**
     * SimulationType constructor.
     */
    public function __construct($values)
    {
        $this->setCustomValues($values);
        print_r($values);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomFamille', 'text');
        $builder->add('nombreEnfant', 'number');
        $builder->add('quotientFamilial', 'number');
        $builder->add('nombreEnfantPartant', 'number');
        $builder->add('infoSejour', 'choice', array(
            'choices' => $this->getCustomValues()
        ));
        $builder->add('valider', 'submit');
    }

    public function getName()
    {
        return 'simulation';
    }

    /**
     * @return mixed
     */
    public function getCustomValues()
    {
        return $this->customValues;
    }

    /**
     * @param mixed $customValues
     */
    public function setCustomValues($customValues)
    {
        $this->customValues = $customValues;
    }




}