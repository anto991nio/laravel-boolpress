<?php

namespace App\Http\Controllers\admin;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
    $tags=Tag::all();

    return view ("admin.tags.index",["tags"=>$tags]);

}

}
