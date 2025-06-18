<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use App\Models\Module;
use App\Models\Path;
use App\Models\PathType;
use App\Models\Stream;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PathController extends Controller
{
    public function list()
    {
        $pageTitle = 'Career Path';
        $paths = Path::with('Module','Category','Subcategory','Pathtype')->get();
        return view('admin.path.list', compact('pageTitle', 'paths'));
    }
    public function add()
    {
        $pageTitle = 'Add Career Path';
        $modules = Module::all();
        $streams = Stream::all();
        $pathtypes = PathType::all();
        return view('admin.path.add', compact('pageTitle', 'streams', 'pathtypes', 'modules'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'pathtype_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
        ]);

        $exists = \App\Models\Path::where('pathtype_id', $request->pathtype_id)
            ->where('subcategory_id', $request->subcategory_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['pathtype_id' => 'The selected path type is already associated with this subcategory.']);
        }

        $store = new Path;
        $store->module_id = $request->module_id;
        $store->stream_id = $request->stream_id;
        $store->category_id = $request->category_id;
        $store->category2_id = $request->category2_id;
        $store->subcategory_id = $request->subcategory_id;
        $store->pathtype_id = $request->pathtype_id;
        $store->stream = $request->stream;
        $store->graduation = $request->graduation;
        $store->after_graduation = $request->after_graduation;
        $store->after_pgraduation = $request->after_pgraduation;
        $store->anyother = $request->anyother;

        $store->save();
        $notify[] = ['success', 'Path has been created successfully'];
        return to_route('admin.path.list')->withNotify($notify);
    }
    public function edit($id)
    {
        $pageTitle = 'Edit Career Path';
        $edit = Path::find($id);
        $modules = Module::all();
        $streams = Stream::all();
        $categories = Category::all();
        $category2 = Category2::all();
        $subcategories = Subcategory::all();
        $pathtypes = PathType::all();
        return view('admin.path.edit', compact('pageTitle', 'edit','streams','category2', 'categories', 'subcategories', 'pathtypes', 'modules'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'pathtype_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
        ]);

        $currentPath = Path::find($request->id);

        $exists = \App\Models\Path::where('pathtype_id', $request->pathtype_id)
            ->where('subcategory_id', $request->subcategory_id)
            ->where('id', '!=', $currentPath->id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['pathtype_id' => 'The selected path type is already associated with this subcategory.']);
        }

        $update = Path::find($request->id);
        $update->module_id = $request->module_id;
        $update->stream_id = $request->stream_id;
        $update->category_id = $request->category_id;
        $update->category2_id = $request->category2_id;
        $update->subcategory_id = $request->subcategory_id;
        $update->pathtype_id = $request->pathtype_id;
        $update->stream = $request->stream;
        $update->graduation = $request->graduation;
        $update->after_graduation = $request->after_graduation;
        $update->after_pgraduation = $request->after_pgraduation;
        $update->anyother = $request->anyother;

        $update->save();
        $notify[] = ['success', 'Path has been updated successfully'];
        return to_route('admin.path.list')->withNotify($notify);
    }
    public function delete(Request $request)
    {
        $delete = Path::find($request->id);
        $delete->delete();
        $notify[] = ['success', 'Path has been deleted successfully'];
        return back()->withNotify($notify);
    }
}
