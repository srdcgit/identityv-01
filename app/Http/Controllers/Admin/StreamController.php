<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stream;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function list(){
        $pageTitle = 'Streams';
        $streams = Stream::all();
        return view('admin.stream.list', compact('pageTitle','streams'));
    }
    public function add(){
        $pageTitle = 'Add Stream';
        return view('admin.stream.add', compact('pageTitle'));
    }
    public function store(Request $request){
        $store = new Stream();
        $store->name = $request->name;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time(). '_' . $image->getClientOriginalName();
            $image->move(public_path('stream'), $imageName);
            $store->image = $imageName;
        }
        $store->save();
        $notify[] = ['success', 'Stream has been created successfully'];
        return to_route('admin.stream.list')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Stream';
        $edit = Stream::find($id);
        return view('admin.stream.edit', compact('pageTitle','edit'));
    }
    public function update(Request $request){
        $update = Stream::find($request->id);
        $update->name = $request->name;
        if($request->hasFile('image')){
            if($update->image && file_exists(public_path('stream/' . $update->image))){
                unlink(public_path('stream/' . $update->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('stream'), $imageName);
            $update->image = $imageName;
        }
        $update->save();
        $notify[] = ['success', 'Stream has been Updated successfully'];
        return to_route('admin.stream.list')->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = Stream::find($request->id);
        if($delete){
            if($delete->image && file_exists(public_path('stream/' . $delete->image))){
                unlink(public_path('stream/' . $delete->image));
            }
        $delete->delete();
        $notify[] = ['success', 'Deleted successfully'];
        return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong...'];
        return back()->withNotify($notify);
    }
}
