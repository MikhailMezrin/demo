<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Task;

class TaskController extends Controller
{
    public function getAllTasks(): JsonResponse
    {
        return response()->json(['Tasks' => Task::all()]);
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
            $task = new Task;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->status = "in developing";
            
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
        try {
            $task = Task::find($id);

            if($request->title){
                $task->title = $request->title;
            }

            if($request->description){
                $task->description = $request->description;
            }

            if($request->status){
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

    
    public function delitTaskById(Request $request, $id): JsonResponse
    {
        try {
            if(! $task = Task::find($id)){
                return response()->json(['message' => "Can't find task"]);
            }
            
            if ($task->delete()) {
                return response()->json(['message' => 'Task delited successfully']);
            } else {
                return response()->json(['message' => 'Something gone wrong']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}


