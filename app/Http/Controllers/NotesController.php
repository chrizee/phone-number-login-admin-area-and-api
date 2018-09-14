<?php

namespace App\Http\Controllers;

use App\Notes;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotesController extends Controller
{
    public function index(Request $request) {
        return $this->allIndex($request, "notes");
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
            'note' => "required|string"
        ]);

        if($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }

        $person  = People::find($request->input('user_id'));
        if (empty($person)) return json_encode(['error' => "Invalid user"]);
        $note = new Notes();
        $note->note = $request->input('note');
        if($person->notes()->save($note)) {
            return json_encode(["success" => true]);
        }
        return json_encode(['error' => "Error saving Note. Try again later"]);
    }

    Public function update(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'note_id' => "required|integer",
            'note' => "required|string"
        ]);

        if($validator->fails()) {
            return json_encode(["error" => "There is a problem with the form you submitted. Make sure all fields are of the correct type"]);
        }
        $note  = Notes::find($request->input('note_id'));
        if(empty($note)) return json_encode(['error' => "Invalid payload"]);
        $note->note = $request->input("note");
        if($note->save()) {
            return json_encode(["success" => true]);
        }
        return json_encode(['error' => "Error updating Notes. Try again later"]);
    }

    Public function delete(Request $request)
    {
        $note  = Notes::find($request->input('note_id'));
        if(empty($note)) return json_encode(['error' => "Invalid payload"]);
        if($note->delete()) return json_encode(["succcess" => true]);
        return json_encode(['error' => "Error deleting note. Try again later"]);
    }
}
