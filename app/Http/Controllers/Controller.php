<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function acro($word){
        $words = explode(' ', $word);
        $initials = array_map(function($word) {
            return strtoupper($word[0]);
        }, $words);

        $initialsString = implode('', $initials);
        return $initialsString;  // Output: JNA
    }
}
