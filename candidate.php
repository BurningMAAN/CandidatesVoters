<?php

class Candidate{
    public $ID;
    public $FirstName;
    public $LastName;
    public $CountOfVotes;

    function __construct($ID_, $name, $lastname){
        $this->ID = $ID_;
        $this->FirstName = $name;
        $this->LastName = $lastname;
        $this->CountOfVotes = 0;
    }
}