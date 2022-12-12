<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class teachercontroller extends Controller
{
    //
    public function getTeacher($id)
{
    $states = DB::table("teachers")
                ->where("nation_id",$id)
                ->pluck("teacher_name","teacher_id");
    return response()->json($teachers);
}
}
