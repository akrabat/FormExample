<?php

namespace Application\Entity;

class Bug
{
    public $title = 'test';
    public $description = 'oops';

    public $reporter;

    function __construct()
    {
        $this->reporter = new User();
        $this->reporter->name = 'Rob';
        $this->reporter->email = 'rob@example.com';
    }
    
    public function populate($data)
    {
        if (isset($data['title'])) {
            $this->title = $data['title'];
        }

        if (isset($data['description'])) {
            $this->description = $data['description'];
        }

        if (isset($data['reporter'])) {
            $this->reporter = $data['reporter'];
        }
    }
}
