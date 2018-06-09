<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class PagesController extends Controller
{

    public function new(){
        echo 'some echoed data';
       echo '</br>';

        $first = 5;
        $secon=9;

        $add = $first + $secon;
        echo $add;

       // return view('new');
    }

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
        return redirect()->back();
    }

    public function delete($id){
        
        $todo = Todo::find(id);
        $todo->delete();
        return redirect()->back();
    }

}
