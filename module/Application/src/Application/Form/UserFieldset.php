<?php

namespace Application\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Application\Entity\User;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;

class UserFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct($name='')
    {
        parent::__construct($name);
        $this->setHydrator(new ObjectPropertyHydrator());
        $this->setObject(new User());

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => "Name",
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',
            'options' => array(
                'label' => "Email",
            ),
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true,
            ),
            'email' => array(
                'required' => true,
            )
        );
    }
}
