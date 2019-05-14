<?php

namespace App\Http\Controllers;

use App\Todo;
use Session;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('todo')->with('todos', Todo::all());
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'todo' => 'required|string'
        ]);
        Todo::create([
            'todo' => $request->todo,
        ]);
        Session::flash("success", "added Successfully!");
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->todo = $request->todo;
        $todo->save();
        Session::flash("success", "update Successfully!");
        return redirect()->back();


    }

//    mark todo as complete
    public function markAsComplete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->complete = 1;
        $todo->save();
        Session::flash("success", "marked as completed Successfully!");
        return redirect()->back();


    }


    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        Session::flash("success", "deleted Successfully!");

        return redirect()->back();
    }
}
