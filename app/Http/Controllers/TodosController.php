<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:6',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Todo create successfully.');

        return redirect('/todos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($todosID)
    {
        return view('todos.show')->with('todo', Todo::find($todosID));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($todoId)
    {
        return view('todos.edit')->with('todo', Todo::find($todoId));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($todoId)
    {
        $this->validate(request(), [
            'name' => 'required|min:6',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = Todo::find($todoId);
        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Todo updated successfully.');

        return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        // $todo = Todo::find($todoId);
        $todo->delete();

        session()->flash('success', 'Todo deleted successfully.');

        return redirect('/todos');
    }

    //complete todo
    public function complete(Todo $todo)
    {
    $todo->completed = true;
    $todo->save();

    session()->flash('success', 'Todo completed successfully.');

    return redirect('/todos');
    }
}
