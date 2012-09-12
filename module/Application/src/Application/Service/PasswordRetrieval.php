<?php

namespace Application\Service;

class PasswordRetrieval extends \ArrayObject
{
    public function sendLostPasswordEmail()
    {
        // do work with $this['email']
        return true;
    }
}

/*
class PasswordRetrieval 
{
    protected $email;

    public function getArrayCopy()
    {
        $array = array(
            'email' => '',
        );
        return $array;
    }

    public function populate($data)
    {
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
    }

    public function sendLostPasswordEmail()
    {
        // do something clever

        return true;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
*/
