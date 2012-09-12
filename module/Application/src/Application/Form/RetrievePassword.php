<?php
namespace Application\Form;

use Zend\Form\Form;

class RetrievePassword extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('retrievepassword');

        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Your email',
            ),
            'attributes' => array(
                'id'    => 'email',
                'placeholder' => 'enter your email address',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',            
            'attributes' => array(
                'value' => 'Retrieve',
                'class' => 'btn-success',
            ),
        ));
    }
}
