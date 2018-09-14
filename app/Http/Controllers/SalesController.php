<?php

namespace App\Http\Controllers;

use App\People;
use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    public function index(Request $request) {

        return $this->allIndex($request, "sales");
    }

    Public function store(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'user_id' => "required|integer",
            'item' => "required|string",
            "amount" => "required|numeric"
        ]);

        if($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }

        $person  = People::find($request->input('user_id'));
        if (empty($person)) return json_encode(['error' => "Invalid user"]);
        $sale = new Sales();
        $sale->item = $request->input('item');
        $sale->amount = $request->input("amount");
        if($person->sales()->save($sale)) {
            return json_encode(["success" => true]);
        }
        return json_encode(['error' => "Error saving sale. Try again later"]);
    }

    Public function update(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'sale_id' => "required|integer",
            'item' => "required|string",
            "amount" => "required|numeric"
        ]);

        if($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }
        $sale  = Sales::find($request->input('sale_id'));
        if(empty($sale)) return json_encode(['error' => "Invalid payload"]);
        $sale->item = $request->input("item");
        $sale->amount = $request->input("amount");
        if($sale->save()) {
            return json_encode(["success" => true]);
        }
        return json_encode(['error' => "Error updating Sale. Try again later"]);
    }

    Public function delete(Request $request)
    {
        $sale  = Sales::find($request->input('sale_id'));
        if(empty($sale)) return json_encode(['error' => "Invalid payload"]);
        if($sale->delete()) return json_encode(["succcess" => true]);
        return json_encode(['error' => "Error deleting sale. Try again later"]);
    }
}
