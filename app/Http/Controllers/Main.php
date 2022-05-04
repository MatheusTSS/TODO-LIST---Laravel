<?php

namespace App\Http\Controllers;

use App\Models\Task;
use DateTime;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function home()
    {
        // get avaible tasks

        $tasks = Task::where('visible', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        // Return to the Main Page
        return view('home', ['tasks' => $tasks]);
    }

    public function new_task()
    {
        // Display New Task Form

        return view('new_task_frm');
    }

    public function new_task_submit(Request $request)
    {
        // Get The New Task Definition
        $new_task = $request->input('text_new_task');

        // Save Task in to the Database
        $task = new Task();
        $task->task = $new_task;
        $task->save();

        // Return to the Main Page
        return redirect()->route('home');
    }

    public function task_done($id)
    {

        // Update to the Task - DONE
        $task = Task::find($id);
        $task->done = new DateTime();
        $task->save();

        // Return to the Main Page
        return redirect()->route('home');
    }

    public function task_undone($id)
    {

        // Update to the Task - UNDONE
        $task = Task::find($id);
        $task->done = null;
        $task->save();

        // Return to the Main Page
        return redirect()->route('home');
    }

    public function edit_task($id)
    {
        // GET Selected Task
        $task = Task::find($id);

        // Display Edit Task Form
        return view('edit_task_frm', ['task' => $task]);
    }

    public function edit_task_submit(Request $request)
    {

        // Get Form Inputs
        $id_task =  $request->input('id_task');
        $edit_task = $request->input('text_edit_task');

        // Update Task
        $task = Task::find($id_task);
        $task->task = $edit_task;
        $task->save();

        // Return to the Main Page
        return redirect()->route('home');
    }

    public function task_invisible($id)
    {

        // Make Task Invisible
        $task = Task::find($id);
        $task->visible = 0;
        $task->save();

        // Return to the Main Page
        return redirect()->route('home');
    }

    public function task_visible($id)
    {
        // Make Task Visible
        $task = Task::find($id);
        $task->visible = 1;
        $task->save();

        // Return to the Main Page
        return redirect()->route('home');
    }

    public function list_invisibles(){
        // Get Invisible Tasks
        $tasks = Task::where('visible', 0)
        ->orderBy('created_at', 'desc')
        ->get();

        // Return to the Main Page
    return view('home', ['tasks' => $tasks]);
    }

}
