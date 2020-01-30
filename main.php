<?php
require('connect_mysql.php');

$MySQLConnection = new MySQLConnector("localhost", "root", "", "test");
$connect = $MySQLConnection->ConnectMySQL();
$kandidatai = $MySQLConnection->getCandidates($connect);
$balsuotojai = $MySQLConnection->getVoters($connect);
$balsai = $MySQLConnection->getVotes($connect);


for($i = 0; $i < sizeof($kandidatai); $i++){
    for($j = 0; $j < sizeof($balsai); $j++){
        if($kandidatai[$i]->ID == $balsai[$j]->CANDIDATE){
            $kandidatai[$i]->CountOfVotes += 1;
        }
    }
}
function compare($first, $second){
    if($first->CountOfVotes == $second->CountOfVotes){
        return strcasecmp($first->LastName, $second->LastName);
    }
    if($first->CountOfVotes == $second->CountOfVotes && strcasecmp($first->LastName, $second->LastName) > 0){
        return strcasecmp($first->FirstName, $second->FirstName);
    }

    return $first->CountOfVotes < $second->CountOfVotes;
}

function GetWinningCandidate($arrayOfCandidates){
    $ID = 0; 
    $maxVotes = $arrayOfCandidates[0]->CountOfVotes;
    for($i = 0; $i < sizeof($arrayOfCandidates); $i++){
        if($arrayOfCandidates[$i]->CountOfVotes > $maxVotes){
            $maxVotes = $arrayOfCandidates[$i]->CountOfVotes;
            $ID = $arrayOfCandidates[$i]->ID;
        }
    }
    return $arrayOfCandidates[$ID]->ID;
}

function GetWinningVoters($arrayOfVotes, $winnerArray){
    $votersArray[] = array();
    $winner = GetWinningCandidate($winnerArray);
    for($i = 0; $i < sizeof($arrayOfVotes); $i++){
        if($arrayOfVotes[$i]->CANDIDATE == $winner){
            array_push($votersArray, $arrayOfVotes[$i]->VOTE);
        }
    }

    return $votersArray;
}

