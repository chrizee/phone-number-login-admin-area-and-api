<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $noUser = "nouser.png";

    protected function allIndex(Request $request, $relation)
    {
        $validator  = Validator::make($request->all(), [
            'user_id' => "required|integer"
        ]);

        if($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }

        $person = People::find($request->input('user_id'));
        if(empty($person)) return json_encode(['error' => "Invalid user"]);
        return $person->$relation->map(function($item) {
            return ($item);
        });
    }
}
