<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;

class TodosController extends Controller
{

public function index(){
    $todos = Todo::all();

    return view('todos')->with('todos',$todos);
}

public function create(){
   
}

public function store(Request $request){
   // dd($request->todo);
    $todo = new Todo;
    $todo->todo = $request->todo;
    $todo->save();
    
    $request->session()->flash('success', "Your Todo was created");
    
    return redirect()->back();
}

public function delete($id){
    
    $todo = Todo::find($id);
    $todo->delete();
    Session::flash('danger', 'Your Todo was Deleted');
    return redirect()->back();
}

public function update($id){
    $todo = Todo::find($id);

    return view('update')->with('todo', $todo);
}

public function save(Request $request, $id){

    //dd($request->all());

    $todo = Todo::find($id);
    $todo->todo = $request->todo;
    $todo->save();
    Session::flash('info', 'Your Todo was Updated');
    return redirect()->route('todos');
}

public function completed($id){
    $todo = Todo::find($id);
    $todo->completed = 1;
    $todo->save(); 
    Session::flash('success', 'Your Todo was Completed');
    return redirect()->back();

    }

}
