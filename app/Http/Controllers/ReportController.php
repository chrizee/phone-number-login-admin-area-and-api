<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function generate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_id" => "required|integer",
            "month" => "required|integer",
            "year" => "required|integer",
        ]);
        if($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }
        $person  = People::find($request->input('user_id'));
        if (empty($person)) return json_encode(['error' => "Invalid user"]);
        $year = $request->input("year");
        $month = $request->input("month");
        $capital = $person->capital()->whereYear("created_at", $year)->whereMonth("created_at", $month)->get();
        $sales = $person->sales()->whereYear("created_at", $year)->whereMonth("created_at", $month)->get();
        $expenses = $person->expense()->whereYear("created_at", $year)->whereMonth("created_at", $month)->get();
        return collect(['capital' => $capital, 'sales' => $sales, 'expenses' => $expenses]);
    }
}
