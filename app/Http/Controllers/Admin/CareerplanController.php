<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Careerplan;
use Illuminate\Http\Request;

class CareerplanController extends Controller
{

    public function list()
    {
        $pageTitle = 'Career Plan';
        $image = Careerplan::all();
        return view('admin.careerplan.list', compact('pageTitle', 'image'));
    }

    public function add()
    {
        $pageTitle = 'Add Career Plan';
        return view('admin.careerplan.add', compact('pageTitle'));
    }

    public function Store(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $image->move(public_path('careerplan'), $imagename);
        }

        $Store = new Careerplan();
        $Store->title = $request->title;
        $Store->description = $request->description;
        $Store->link = $request->link;
        $Store->image = $imagename;
        $Store->save();

        $notify[] = ['success', 'Carrer Plan has been created successfully'];
        return to_route('admin.careerplan.list')->withNotify($notify);
    }

    public function edit($id)
    {
        $pageTitle = 'Edit Career Plan';
        $edit = Careerplan::find($id);
        return view('admin.careerplan.edit', compact('pageTitle', 'edit'));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $image->move(public_path('careerplan'), $imagename);
        }
        $update = Careerplan::find($id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->link = $request->link;
        $update->image = $imagename;
        $update->save();
        $notify[] = ['success', 'Career Plan has been updated successfully'];
        return to_route('admin.careerplan.list')->withNotify($notify);
    }

    public function delete(Request $request)
    {
        $delete = Careerplan::find($request->id);
        $delete->delete();

        $notify[] = ['success', 'Career Plan has been deleted successfully'];
        return back()->withNotify($notify);
    }
}
