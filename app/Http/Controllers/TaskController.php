<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    //显示所有数据
    public function fetchAllTasks(){
        //all() = "SELECT * FROM 'tasks'";
        $tasks = Tasks::all();
        //$row['column, name']
        //return view('index', ['tasks' => $tasks]);
        return view('index', compact('tasks'));
    }

    public function createTask(){
        return view('create');
    }

    //添加数据
    public function addTask(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date'
        ]);

        Tasks::create($request->all());

        return redirect()->route('index')->with('success', 'Tasks added successfully');
    }

    public function doneTask(Request $request, $id){
        $tasks = Tasks::findOrFail($id);

        $tasks->isCompleted = true;
        $tasks->save();

        return redirect()->route('index')->with('success', 'Task marked as done successfully');
    }

    public function editTask($id){
        $tasks = Tasks::findOrFail($id);

        return view('edit', compact('tasks'));
    }

    public function updateTask(Request $request, $id){
        $tasks = Tasks::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date'
        ]);

        $tasks->update($request->all());

        return redirect()->route('index')->with('success', 'Task Updated Successfully');
    }

    public function deleteTask($id){

        $tasks = Tasks::findOrFail($id);

        //$sql= "DELETE *FROM tasks WHERE"
        $tasks->delete();
        return redirect()->route('index')->with('success', 'Task deleted successfully');
    }
}
