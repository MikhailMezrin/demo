<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{

    public function postNewTask(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
            ]);
            if(!User::find($request->input('user'))) return response()->json(['message' => "Can't find user"],500);
            $task = new Task;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->userId = $request->input('user');
                
            $task->status = "задача в работе";
            
            if ($task->save()) {
                return view('mainPage');
            } else {
                return response()->json(['message' => 'Something gone wrong']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function editTaskById(Request $request, $id)
    {
        $statuses = ["задача в работе", "задача выполнена"];
        try {
            $task = Task::find($id);

            if(!$task) return response()->json(['message' => "Can't find task ".$id]);
            if($request->title) $task->title = $request->title;

            if($request->description) $task->description = $request->description;

            if($request->status) {
                if(!in_array($request->status, $statuses)) return response()
                ->json(['message' => 'status must be '.implode(' or ', $statuses)]);

                $task->status = $request->status;
            }
            
            if ($task->save()) {
                return response()->view('mainPage');
            } else {
                return response()->json(['message' => 'Something gone wrong']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    
    public function deleteTaskById(Request $request, $id)
    {
        try {
            if(! $task = Task::find($id)){
                return response()->json(['message' => "Can't find task"], 500);
            }
            if ($task->delete()) {
                return response()->view('mainPage');
            } else {
                return response()->json(['message' => 'Something gone wrong'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

//======FORMS=======
    
    public function postTaskForm()
    {
    $users = User::all()->sortBy('name');
    return view('postNewTaskForm', compact('users'));
    }

    public function getUserTasksForm(Request $request)
    {
    if(!User::find($request->input('user'))) return response()->json(['message' => "Can't find user"],500);
    $userId = $request->input('user');
    $user = User::find($userId);
    $tasks = Task::all()->where('userId', $userId)->sortBy('created_at');
    return view('getUserTaskForm', compact('tasks'));
    }

    public function editUserTaskForm(Request $request, $id)
    {
    $task = Task::find($id);
    return view('editTaskForm', compact('task'));
    }

    public function deleteUserTaskForm(Request $request, $id)
    {
    $task = Task::find($id);
    return view('deleteTaskForm', compact('task'));
    }
}


