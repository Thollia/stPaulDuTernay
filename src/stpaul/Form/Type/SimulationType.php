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

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomFamille', 'text');
        $builder->add('nombreEnfant', 'number');
        $builder->add('quotientFamilial', 'number');
        $builder->add('nombreEnfantPartant', 'number');
        $builder->add('valider', 'submit');
    }

    public function getName()
    {
        return 'simulation';
    }

}