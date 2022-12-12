<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Link;

class app_controller extends Controller
{
    //show
    public function index()
    {


            $links = Link::all();
                return view('layouts.laracrud')->with('links', $links);

    }
    //--CREATE a link--//
 public function create(Request $request)
 {
   $link = Link::create($request->all());
     return Response::json($link);
}

//--GET LINK TO EDIT--//
public function edit($link_id)
 {
    $link = Link::find($link_id);
    return Response::json($link);
}
//--UPDATE a link--//
public function update(Request $request, $id) {
    $link = Link::find($id);
    $link->url = $request->url;
    $link->description = $request->description;
    $link->save();
    return Response::json($link);
}
public function delete($link_id) {
        $link = Link::destroy($link_id);
        return Response::json($link);
    }
}
