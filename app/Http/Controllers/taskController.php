<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
class taskController extends Controller
{
   public function index(){
    $tasks = task::all(); 
return response()->json($tasks);
   }


   public function store(Request $request)
   {
       $data = $request->validate([
           'title' => 'required',
           'status' => 'required',
           'duedate' => 'required|date',
           'startdate' => 'required|date',
           'assigned' => 'required',
       ]);

       $task = task::create($data);
       return response()->json($task);
   }
   public function destroy($id)
   {
       $task = task::findOrFail($id);
       $task->delete();
       return response()->json(['message' => 'Task deleted successfully']);
   }
   public function update(Request $request, $id)
   {
       $data = $request->validate([
           'title' => 'required',
           'status' => 'required',
           'duedate' => 'required|date',
           'startdate' => 'required|date',
           'assigned' => 'required',
       ]);

       $task = task::findOrFail($id);
       if ($data['status'] === 'Completed') {
         $data['actualEndDate'] = now(); 
     } elseif ($data['status'] !== 'Completed') {
         $data['actualEndDate'] = null; 
     }
       $task->update($data);
       return response()->json($task);
   }


}
