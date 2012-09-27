<?php
namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class Bug extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('bug');

        $this->setAttribute('method', 'post')
             ->setInputFilter(new InputFilter());

        $this->add(array(
            'type' => 'Application\Form\BugFieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));

        // $this->add(array(
        //     'type' => 'Zend\Form\Element\Csrf',
        //     'name' => 'csrf'
        // ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',            
            'attributes' => array(
                'value' => 'Add',
                'class' => 'btn-success',
            ),
        ));
    }
}
