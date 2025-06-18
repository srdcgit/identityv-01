<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $pageTitle = 'Scholarship';
        $scholarships = Scholarship::all();
        return view('admin.scholarship.list', compact('pageTitle','scholarships'));

    }

    public function add()
    {
        $pageTitle = 'Add Scholarship';
        return view('admin.scholarship.add', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $store = new Scholarship();
        $store->type = $request->type;
        $store->class = $request->class;
        $store->name = $request->name;
        $store->short_description = $request->short_description;
        $store->url = $request->url;
        $store->is_free = $request->has('is_free');
        $store->save();
        $notify[] = ['success', 'Scholarship has been created successfully'];
        return to_route('admin.scholarship.index')->withNotify($notify);
    }

    public function edit($id)
    {
        $pageTitle = 'Edit Scholarship';
        $edit = Scholarship::find($id);
        return view('admin.scholarship.edit', compact('pageTitle','edit'));
    }

    public function update(Request $request)
    {
        $update = Scholarship::find($request->id);
        $update->type = $request->type;
        $update->class = $request->class;
        $update->name = $request->name;
        $update->short_description = $request->short_description;
        $update->url = $request->url;
        $update->is_free = $request->has('is_free');
        $update->save();
        $notify[] = ['success', 'Scholarship has been updated successfully'];
        return to_route('admin.scholarship.index')->withNotify($notify);
    }

    public function delete(Request $request)
    {
        $delete= Scholarship::find($request->id);
        if($delete){
            $delete->delete();
            $notify[] = ['success', 'Scholarship has been Deleted successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong.'];
            return back()->withNotify($notify);
    }
}
