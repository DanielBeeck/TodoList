<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $data = Todo::all();
        return view("/welcome", ["todo" => $data]);
    }

    public function insertTupel(Request $request)
    {
        $request->validate([
            "Name" => "required",
            "Beschreibung" => "required",
            "Datum" => "nullable|date_format:Y-m-d",
            "Uhrzeit" => "nullable|date_format:H:i",
        ]);
        $query = DB::table("Todo")->insert([
            "Name" => $request->input("Name"),
            "Beschreibung" => $request->input("Beschreibung"),
            "Datum" => $request->input("Datum"),
            "Uhrzeit" => $request->input("Uhrzeit"),
        ]);

        if ($query) {
            return back()->with("Success");
        } else {
            return back()->with("Something went Wrong :(");
        }
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('/edit')->with('todos', $todo);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $input = $request->all();
        $todo->update($input);
        return redirect('/');
    }

    public function updateStatus(Request $request, $id)
    {
        $todo = Todo::find($id);

        $status = $request->has('Status') ? 'erledigt' : 'nicht erledigt';

        $todo->update(['Status' => $status]);

        return redirect('/');
    }

    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect('/');
    }

}
