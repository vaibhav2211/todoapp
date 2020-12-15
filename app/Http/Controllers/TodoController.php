<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class TodoController extends Controller
{   
    //home page view
    public function homeView(){
        Paginator::useBootstrap();
        $todos=Todo::where('user_id',session('id'))->paginate(5);
        return view("home",["todos"=>$todos]);
    }
    //adding todo
    public function addTodo(Request $req){
        $req->validate([
            'title'=>'required|min:5',
            'description'=>'required|min:10|max:255',
        ]);
        Todo::create([
            'title'=>$req->title,
            'description'=>$req->description,
            'user_id'=>session('id')
        ]);
        return back()->with("message","Todo Added Successfully");
    }
    //completing todo
    public function completeTodo($id){
        $todo=Todo::find($id);
        $todo->completed=1;
        $todo->save();
        return redirect("/");
    }
    public function deleteTodo($id){
        $todo=Todo::find($id);
        $todo->delete();
        return redirect('/');
    }
}
