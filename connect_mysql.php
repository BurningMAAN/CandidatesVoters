<?php
require('candidate.php');
require('voter.php');
class MySQLConnector{
    public $servername;
    public $username;
    private $password;
    public $database;
    public $conn;
    function __construct($server, $user, $pass, $db){
        $this->servername = $server;
        $this->username = $user;
        $this->password = $pass;
        $this->database = $db;
    }

    function ConnectMySQL(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ( $this->conn->connect_error) {
            die("Nepavyko prisijungti prie DB: " .  $this->conn->connect_error);
        }
        else{
            $this->conn->set_charset("utf8");
            return 1;
        }
    }

    function getCandidates($connection){
        $candidateArray = array();
        $query = "SELECT id, firstname, lastname FROM candidates";
        $result =  $this->conn->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $candidateArray[] = new Candidate($row["id"], $row["firstname"], $row["lastname"]);
            }
        }
        return $candidateArray;
    }

    function getVoters($connection){
        $votersArray = array();
        $query = "SELECT id, firstname, lastname FROM voters";
        $result =  $this->conn->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $votersArray[] = new Voter($row["id"], $row["firstname"], $row["lastname"]);
            }
        }
        return $votersArray;
    }

    function getVotes($connection){
        $query = "SELECT candidate_id, voter_id FROM candidatesvoters";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $votesArray[] = (object) array(
                    'CANDIDATE' => $row["candidate_id"],
                    'VOTE' => $row["voter_id"]
                );
            }
        }

        return $votesArray;
    }
}