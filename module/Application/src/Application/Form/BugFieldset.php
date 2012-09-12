<?php
namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;
use Application\Entity\Bug as BugEntity;

class BugFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('bug');
        $this->setHydrator(new ObjectPropertyHydrator());
        $this->setObject(new BugEntity());

        $this->add(array(
            'name' => 'title',
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'description',
            'type' => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'Description',
            ),
        ));

        // one to one relations with a Reporter
        $this->add(array(
            'type' => 'Application\Form\UserFieldset',
            'name' => 'reporter',
        ));

    }

    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true,
            ),
            'description' => array(
                'required' => true,
            ),
        );
    }    
}
