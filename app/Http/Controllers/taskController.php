<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function getAllTasks(Request $request): JsonResponse
    {
        if($request->SortByUpdate) return response()->json(['Tasks' => Task::all()->sortByDesc('updated_at')]);
        return response()->json(['Tasks' => Task::all()->sortByDesc('created_at')]);
    }

    public function getTaskById($id): JsonResponse
    {
        return response()->json(['Tasks' => Task::find($id)]);
    }

    public function postNewTask(Request $request): JsonResponse
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
                return response()->json(['message' => 'Task created successfully']);
            } else {
                return response()->json(['message' => 'Something gone wrong']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function editTaskById(Request $request, $id): JsonResponse
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
                return response()->json(['message' => 'Task updated successfully']);
            } else {
                return response()->json(['message' => 'Something gone wrong']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    
    public function deleteTaskById(Request $request, $id): JsonResponse
    {
        try {
            if(! $task = Task::find($id)){
                return response()->json(['message' => "Can't find task"]);
            }
            
            if ($task->delete()) {
                return response()->json(['message' => 'Task deleted successfully']);
            } else {
                return response()->json(['message' => 'Something gone wrong']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}


