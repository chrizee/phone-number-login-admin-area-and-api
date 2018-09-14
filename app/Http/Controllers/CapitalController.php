<?php

namespace App\Http\Controllers;

use App\Capital;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CapitalController extends Controller
{
    public function index(Request $request)
    {
        return $this->allIndex($request, "capital");
        /*$validator  = Validator::make($request->all(), [
            'user_id' => "required|integer"
        ]);

        if($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }

        $person = People::find($request->input('user_id'));
        if(empty($person)) return json_encode(['error' => "Invalid user"]);
        return $person->capital->map(function($item) {
            return new CapitalResource($item);
        });*/
    }

    Public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => "required|integer",
            "amount" => "required|numeric"
        ]);

        if ($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }

        $person = People::find($request->input('user_id'));
        if (empty($person)) return json_encode(['error' => "Invalid user"]);
        $capital = new Capital();
        $capital->amount = $request->input("amount");
        if ($person->capital()->save($capital)) {
            return json_encode(["success" => true]);
        }
        return json_encode(['error' => "Error saving capital. Try again later"]);
    }

    Public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'capital_id' => "required|integer",
            "amount" => "required|numeric"
        ]);

        if ($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }
        $capital = Capital::find($request->input('capital_id'));
        if (empty($capital)) return json_encode(['error' => "Invalid payload"]);
        $capital->amount = $request->input("amount");
        if ($capital->save()) {
            return json_encode(["success" => true]);
        }
        return json_encode(['error' => "Error updating capital. Try again later"]);
    }

    Public function delete(Request $request)
    {
        $capital = Capital::find($request->input('capital_id'));
        if (empty($capital)) {
            return json_encode(['error' => "Invalid payload"]);
        }
        if ($capital->delete()) {
            return json_encode(["success" => true]);
        }
        return json_encode(['error' => "Error deleting capital. Try again later"]);
    }
}
