<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use Illuminate\Http\Request;

class Category2Controller extends Controller
{
    public function list()
    {
        $pageTitle = 'Category2';
        $categoeies2 = Category2::with('getCategory')->get();
        return view('admin.category2.list', compact('pageTitle','categoeies2'));
    }
    public function add()
    {
        $pageTitle = 'Add 2nd Category';
        $category = Category::all();
        return view('admin.category2.add', compact('pageTitle','category'));
    }
    public function store(Request $request)
    {
        $store = new Category2();
        $store->name = $request->name;
        $store->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('2nd Category'), $imageName);
            $store->image = $imageName;
        }
        $store->save();
        $notify[] = ['success', '2nd Category has been created successfully'];
        return to_route('admin.category2.list')->withNotify($notify);
    }
    public function edit($id)
    {
        $pageTitle = 'Edit Stream';
        $edit = Category2::find($id);
        $category = Category::all();
        return view('admin.category2.edit', compact('pageTitle', 'edit', 'category'));
    }
    public function update(Request $request)
    {
        $update = Category2::find($request->id);
        $update->name = $request->name;
        $update->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            if ($update->image && file_exists(public_path('2nd Category/' . $update->image))) {
                unlink(public_path('2nd Category/' . $update->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('2nd Category'), $imageName);
            $update->image = $imageName;
        }
        $update->save();
        $notify[] = ['success', '2nd Category has been Updated successfully'];
        return to_route('admin.category2.list')->withNotify($notify);
    }
    public function delete(Request $request)
    {
        $delete = Category2::find($request->id);
        if ($delete) {
            if ($delete->image && file_exists(public_path('2nd Category/' . $delete->image))) {
                unlink(public_path('2nd Category/' . $delete->image));
            }
            $delete->delete();
            $notify[] = ['success', 'Deleted successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong...'];
        return back()->withNotify($notify);
    }
}
