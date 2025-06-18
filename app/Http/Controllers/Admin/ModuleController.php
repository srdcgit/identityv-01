<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Entrance;
use App\Models\Institution;
use App\Models\Module;
use App\Models\Path;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function list(){
        $pageTitle = 'Modules';
        $modules = Module::orderBy('position','asc')->paginate(getPaginate());
        return view('admin.modules.list', compact('pageTitle','modules'));
    }
    public function add(){
        $pageTitle = 'Add Modules';
        return view('admin.modules.add', compact('pageTitle'));
    }
    public function store(Request $request){
        $store = new Module;
        $request->validate([
            'position'=> 'required|unique:modules,position',
        ]);

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $photoName = time(). '_' . $photo->getClientOriginalName();
            $photo->move(public_path('modules'),$photoName);
            $store->image = $photoName;
        }
        $store->title = $request->title;
        $store->btn_text = $request->btn_text;
        $store->url = $request->url;
        $store->position = $request->position;
        $store->is_free = $request->has('is_free');
        $store->save();

        $notify[] = ['success', 'Module has been created successfully'];
        return to_route('admin.module.list')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Modules';
        $edit = Module::find($id);
        return view('admin.modules.edit',compact('edit','pageTitle'));
    }
    public function update(Request $request){
        $update = Module::find($request->id);
        $request->validate([
            'position'=>'required|unique:modules,position,'. $update->id,
        ]);
        if($request->hasFile('image')){
            if($update->image && file_exists(public_path('modules/' . $update->image))){
                unlink(public_path('modules/' . $update->image));
            }
            $photo = $request->file('image');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('modules'), $photoName);
            $update->image = $photoName;
        }
        $update->title = $request->title;
        $update->btn_text = $request->btn_text;
        $update->url = $request->url;
        $update->position = $request->position;
        $update->is_free = $request->has('is_free');
        $update->save();

        $notify[] = ['success', 'Module has been updated successfully'];
        return to_route('admin.module.list')->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = Module::find($request->id);
        if ($delete) {
            if ($delete->image && file_exists(public_path('modules/' . $delete->image))) {
                unlink(public_path('modules/' . $delete->image));
            }
            // Category::where('module_id', $request->id)->delete();
            Path::where('module_id', $request->id)->delete();
            Entrance::where('module_id', $request->id)->delete();
            Institution::where('module_id', $request->id)->delete();
            $delete->delete();
            $notify[] = ['success', 'Module has been deleted successfully'];
        } else {
            $notify[] = ['error', 'Module not found'];
        }
        return back()->withNotify($notify);
    }
}
