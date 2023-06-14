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


function getUniquePCId() {
    $uuid = null;
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $uuid = getWindowsUUID();
    } elseif (strtoupper(PHP_OS) === 'LINUX') {
        $uuid = getLinuxUUID();
    } elseif (strtoupper(PHP_OS) === 'DARWIN') {
        $uuid = getMacUUID();
    }

    return $uuid;
}

// function of type of OS

function getMacUUID() {
    $output = shell_exec('ioreg -rd1 -c IOPlatformExpertDevice | grep "IOPlatformUUID" | cut -c27-62');
    return trim($output);
}

function getLinuxUUID() {
    $output = shell_exec('sudo cat /sys/class/dmi/id/product_uuid');
    return trim($output);
}

function getWindowsUUID() {
    $output = shell_exec('wmic csproduct get UUID');
    $lines = explode("\n", trim($output));
    return isset($lines[1]) ? trim($lines[1]) : null;
}


function getRole(){
    return auth()->user()->getRoleNames()->first();
}



