<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\PeopleResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\People;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PeopleController extends Controller
{
    private $viewPath = "admin.people.";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People::paginate(500);
        $data = [
          'title1' => "Users",
            'title2' => "users",
            'people' => $people
        ];
        return view($this->viewPath.'index')->with($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\PeopleResource
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => "string|required|max:191",
            'email' => "email|nullable|max:191|string|unique:people",
            'phone' => "string|required|size:11|unique:people",
            'password' => 'required|string|min:6|confirmed',
        ]);

        $person = new People;
        $person->name = $request->input('name');
        $person->email = !empty($request->input('email')) ? $request->input('email') : "";
        $person->phone = $request->input('phone');
        $person->password = bcrypt($request->input('password'));
        if($person->save())
            return new PeopleResource($person);
        return json_encode(["error" => "Error creating Account. Try again"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\PeopleResource
     */
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'email' => [
                'bail',
                'nullable',
                'email',
                'max:191',
                Rule::unique('people')->ignore($request->input('id')),
            ],
            'phone' => [
                'bail',
                'string',
                'required',
                'size:11',
                Rule::unique('people')->ignore($request->input('id'))
            ],
            'name' => 'bail|required|string|max:191',
            'password' => 'bail|nullable|string|min:6|confirmed'
        ])->validate();

        $person = People::findOrFail($request->input('id'));
        $person->name = $request->input('name');
        $person->email = !empty($request->input('email')) ? $request->input('email') : "";
        $person->phone = $request->input('phone');
        if(!empty($request->input('password')))
            $person->password = bcrypt($request->input('password'));
        if($person->save())
            return new PeopleResource($person);
        return json_encode(["error" => "Error updating record. Try again"]);
    }

    public function login(Request $request) {
        $person = '';
        if(!empty($request->input('phone')))
            $person = People::where('phone', $request->input('phone'))->get();
        if(!empty($request->input('email')))
            $person = People::where('email', $request->input('email'))->get();

        if(!empty($person->first())) {
            $person = $person->first();
        }else {
            return json_encode(["error" => "No user with that record"]);
        }
        if(Hash::check($request->input('password'), $person->password)) {
            PeopleResource::withoutWrapping();
            return new PeopleResource($person);
        }else {
            return json_encode(["error" => "Wrong password"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = People::findOrFail($id);
        $person->delete();
        return redirect()->route('users.index')->with('success', "User deleted");
    }

    //for api delete
    public function delete($id)
    {
        $person = People::findOrFail($id);
        $person->delete();
        return new PeopleResource($person);
    }
}
