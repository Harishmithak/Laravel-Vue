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
}
