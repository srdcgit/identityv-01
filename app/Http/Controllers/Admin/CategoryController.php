<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use App\Models\Entrance;
use App\Models\Institution;
use App\Models\MasterClass;
use App\Models\Module;
use App\Models\Path;
use App\Models\Stream;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){
        $pageTitle = 'Category';
        $categories = Category::orderBy('created_at','desc')->paginate(getPaginate());
        return view('admin.category.list',compact('pageTitle','categories'));
    }
    public function add(){
        $pageTitle = 'Add Category';
        $streams = Stream::all();
        $institutions = Institution::all();
        return view('admin.category.add', compact('pageTitle','streams','institutions'));
    }
    public function store(Request $request){
        $store = new Category;
        $store->stream_id = $request->stream_id;
        $store->title = $request->title;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'_' . $file->getClientOriginalName();
            $file->move(public_path('category'),$fileName);
            $store->file = $fileName;
        }
        $store->description = $request->description;
        $store->is_upgrade = $request->is_upgrade;
        $store->save();

         // Sync multiple institution_ids
         if ($request->has('institution_id')) {
            $store->institutions()->sync($request->institution_id);
        }

        $notify[] = ['success', 'Category has been created successfully'];
        return to_route('admin.category.list')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Category';
        $streams = Stream::all();
        $edit = Category::find($id);
        return view('admin.category.edit', compact('pageTitle','edit','streams'));
    }
    public function update(Request $request){
        $update = Category::find($request->id);
        $update->stream_id = $request->stream_id;
        $update->title = $request->title;

        if($request->hasFile('file')){
            if($update->file && file_exists(public_path('category/' . $update->file))){
                unlink(public_path('category/' . $update->file));
            }
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('category'), $fileName);
            $update->file = $fileName;
        }

        $update->description = $request->description;
        $update->is_upgrade = $request->is_upgrade;
        $update->save();

         // ✅ Sync selected institutions
         if ($request->has('institution_id')) {
            $update->institutions()->sync($request->institution_id); // keep pivot table updated
        } else {
            $update->institutions()->detach(); // if none selected, clear the pivot table
        }

        $notify[] = ['success', 'Category has been updated successfully'];
        return to_route('admin.category.list')->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = Category::find($request->id);
        if ($delete) {
            if ($delete->file && file_exists(public_path('category/' . $delete->file))) {
                unlink(public_path('category/' . $delete->file));
            }
            Subcategory::where('category_id',$request->id)->delete();
            Entrance::where('category_id',$request->id)->delete();
            Path::where('category_id',$request->id)->delete();
            Institution::where('category_id',$request->id)->delete();
            MasterClass::where('category_id',$request->id)->delete();
            $delete->delete();
            $notify[] = ['success','Category has been deleted successfully'];
        } else {
            $notify[] = ['error', 'Category not found'];
        }
        return back()->withNotify($notify);
    }

    public function fetchCategory(Request $request){
        $getCategory = Category::where('stream_id', $request->stream)->get();
        return response()->json($getCategory);
    }
    public function fetch2ndCategory(Request $request){
        $getCategory = Category2::where('category_id', $request->category)->get();
        return response()->json($getCategory);
    }
    public function fetchSubcategory(Request $request){
        $getSubcategory = Subcategory::where('category_id', $request->category2)->get();
        return response()->json($getSubcategory);
    }
}
