<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function add()
    {
        $a = request()->get('a');
        $b = request()->get('b');
        if (!is_numeric($a)) {
            return response(["json"=>'a must be a digit'], 511);
        }
        if (!is_numeric($b)) {
            return response(["json"=>'b must be a digit'], 511);
        }
        $user = new User();
        return response(["json"=>[$user->add($a, $b)]]);
    }
}
