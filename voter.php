<?php

class Voter{
    public $ID;
    public $FirstName;
    public $LastName;

    function __construct($ID_, $name, $lastname){
        $this->ID = $ID_;
        $this->FirstName = $name;
        $this->LastName = $lastname;
    }
}