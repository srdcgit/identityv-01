<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use App\Models\Entrance;
use App\Models\Institution;
use App\Models\MasterClass;
use App\Models\Path;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function list()
    {
        $pageTitle = 'Subcategory';
        $subcategories = Subcategory::orderBy('id', 'desc')->with('getCategory','userCategory','institutions')->paginate(getPaginate());
        // dd($subcategories );
        return view('admin.subcategory.list', compact('pageTitle', 'subcategories'));
    }
    public function add()
    {
        $pageTitle = 'Add Subcategory';
        $categories = Category2::all();
        $maincategories = Category::all();
        $institutions = Institution::all();
        return view('admin.subcategory.add', compact('pageTitle', 'categories', 'institutions','maincategories'));
    }

    public function store(Request $request)
    {
        $store = new Subcategory();
    
        $store->category_id = $request->category_id;
        $store->maincategory_id = $request->maincategory_id;
        $store->title = $request->title;
        $store->description = $request->description;
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Subcategory'), $fileName);
            $store->file = $fileName;
        }
    
        $store->save();
    
        // Sync multiple institution_ids
        if ($request->has('institution_id')) {
            $store->institutions()->sync($request->institution_id);
        }
    
        $notify[] = ['success', 'Subcategory has been created successfully'];
        return to_route('admin.subcategory.list')->withNotify($notify);
    }
    
    public function edit($id)
    {
        $pageTitle = 'Edit Subcategory';
        $categories = Category2::all();
        $maincategories = Category::all();
        $edit = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('pageTitle', 'edit', 'categories','maincategories'));
    }
    public function update(Request $request)
    {
        $update = Subcategory::findOrFail($request->id); // safer than find()
    
        $update->category_id = $request->category_id;
        $update->maincategory_id = $request->maincategory_id;  
        $update->title = $request->title;
    
        if ($request->hasFile('file')) {
            if ($update->file && file_exists(public_path('Subcategory/' . $update->file))) {
                unlink(public_path('Subcategory/' . $update->file));
            }
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Subcategory'), $fileName);
            $update->file = $fileName;
        }
    
        $update->description = $request->description;
        $update->save();
    
        // ✅ Sync selected institutions
        if ($request->has('institution_id')) {
            $update->institutions()->sync($request->institution_id); // keep pivot table updated
        } else {
            $update->institutions()->detach(); // if none selected, clear the pivot table
        }
    
        $notify[] = ['success', 'Subcategory has been updated successfully'];
        return to_route('admin.subcategory.list')->withNotify($notify);
    }
    
    public function delete(Request $request)
    {
        $delete = Subcategory::find($request->id);
        if ($delete) {
            if ($delete->file && file_exists(public_path('Subcategory/' . $delete->file))) {
                unlink(public_path('Subcategory/' . $delete->file));
            }
            Entrance::where('subcategory_id', $request->id)->delete();
            Path::where('subcategory_id', $request->id)->delete();
            MasterClass::where('subcategory_id', $request->id)->delete();
            $delete->delete();
            $notify[] = ['success', 'Subcategory has been deleted successfully'];
        } else {
            $notify[] = ['error', 'Subcategory not found'];
        }
        return back()->withNotify($notify);
    }
    public function getSubcategory(Request $request)
    {
        $get_subcategory = Subcategory::where('category_id', $request->category_id)->get();

        return response()->json($get_subcategory);
    }

    public function getInstitution(Request $request)
    {
        $query = $request->input('q', '');
        $categoryId = $request->input('category_id');

        $institutions = Institution::query()
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->when($query, fn($q) => $q->where('name', 'like', "%$query%"))
            ->select('id', 'name')
            ->get();

        return response()->json($institutions);
    }
}
