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
}
