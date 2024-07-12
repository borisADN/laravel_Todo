<?php


namespace App\Http\Controllers;
use App\Models\todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome',[
            'todos' => $todos
        ]);
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        Todo::create($attributes);
        return redirect('/');
    }
    public function update( todo $todo){
        $todo->update(['isDone' => true]);
        return redirect('/');
    }
// public function update(Request $request, todo $todo){
//     $attributes = $request->validate([
//         'title' => 'required',
//         'description' => 'nullable'
//     ]);
//     $todo->update($attributes);
//     return redirect('/');
// }

public function destroy(todo $todo){
    $todo->delete();
    return redirect('/');
}
    }
