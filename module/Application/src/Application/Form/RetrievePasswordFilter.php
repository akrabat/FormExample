<?php
namespace Application\Form;

use Zend\InputFilter\InputFilter;

class RetrievePasswordFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name'     => 'email',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                ),
            'validators' => array(
                array(
                    'name'    => 'NotEmpty',
                    'break_chain_on_failure' => true,
                    'options' => array(
                        'messages' => array('isEmpty' => 'Your email address is required'),
                    ),
                ),
                array(
                    'name'    => 'EmailAddress',
                    'options' => array(
                        'messages' => array('emailAddressInvalidFormat' 
                                    => 'Please enter a valid email address'),
                    ),
                ),
            ),
        ));
    }
}
