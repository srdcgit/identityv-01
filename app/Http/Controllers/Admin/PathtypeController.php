<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Path;
use App\Models\PathType;
use Illuminate\Http\Request;

class PathtypeController extends Controller
{
    public function index(){
        $pageTitle = 'Path Type';
        $path_types = PathType::all();
        return view('admin.path-type.index', compact('pageTitle','path_types'));
    }
    public function store(Request $request){
        $request->validate(['title'=> 'required| unique:path_types,title,']);

        $store = new PathType();

        $store->title = $request->title;
        $store->save();

        $notify[] = ['success', 'Pathtype has been created successfully'];
        return back()->withNotify($notify);
    }
    public function update(Request $request, $id) {
        $country = PathType::find($id);

        $country->title = $request->title;
        $country->save();

        $notify[] = ['success', 'Pathtype has been updated successfully'];
        return back()->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = PathType::find($request->id);

        Path::where('pathtype_id',$request->id)->delete();
        $delete->delete();
        $notify[] = ['success', 'Country has been deleted successfully'];
        return back()->withNotify($notify);
    }
}
