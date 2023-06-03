<?php
function acro($word){
    $words = explode(' ', $word);
    $initials = array_map(function($word) {
        return strtoupper($word[0]);
    }, $words);

    $initialsString = implode('', $initials);
    return $initialsString;
}


function displayName($name){
    $temp = explode(" ",$name);
    $lastWord = end($temp);
    $firtLetter = $name[0].".";
    return $firtLetter." ".$lastWord;
}
