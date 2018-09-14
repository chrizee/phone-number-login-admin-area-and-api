<?php

namespace App\Http\Controllers;

use App\Expense;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    public function index(Request $request) {
        return $this->allIndex($request, "expense");
        /*$validator  = Validator::make($request->all(), [
            'user_id' => "required|integer"
        ]);

        if($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }

        $person = People::find($request->input('user_id'));
        if(empty($person)) return json_encode(['error' => "Invalid user"]);
        return $person->expense->map(function($item) {
            return new ExpensesResource($item);
        });*/
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
        $expense = new Expense();
        $expense->item = $request->input('item');
        $expense->amount = $request->input("amount");
        if($person->expense()->save($expense)) {
            return json_encode(["success" => true]);
        }
        return json_encode(['error' => "Error saving expense. Try again later"]);
    }

    Public function update(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'expense_id' => "required|integer",
            'item' => "required|string",
            "amount" => "required|numeric"
        ]);

        if($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }
        $expense  = Expense::find($request->input('expense_id'));
        if(empty($expense)) return json_encode(['error' => "Invalid payload"]);
        $expense->item = $request->input("item");
        $expense->amount = $request->input("amount");
        if($expense->save()) {
            return json_encode(["success" => true]);
        }
        return json_encode(['error' => "Error updating Expense. Try again later"]);
    }

    Public function delete(Request $request)
    {
        $expense  = Expense::find($request->input('expense_id'));
        if(empty($expense)) return json_encode(['error' => "Invalid payload"]);
        if($expense->delete()) return json_encode(["succcess" => true]);
        return json_encode(['error' => "Error deleting expense. Try again later"]);
    }
}
