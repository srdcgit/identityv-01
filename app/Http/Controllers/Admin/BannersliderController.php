<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bannerslider;
use Illuminate\Http\Request;

class BannersliderController extends Controller
{
    public function list()
    {
        $pageTitle = 'Bannerslider';
        $image = Bannerslider::all();
        return view('admin.bannerslider.list', compact('pageTitle','image'));
    }

    public function add()
    {
        $pageTitle = 'Add Banner';
        return view('admin.bannerslider.add', compact('pageTitle'));
    }

    public function Store(Request $request)
    {
        // dd($request->all());
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $image->move(public_path('banner'),$imagename);
        }

        $Store = new Bannerslider();
        $Store->title = $request->title;
       $Store->description = $request->description;
        $Store->save();

        $notify[] = ['success', 'Banner has been created successfully'];
        return to_route('admin.bannerslider.list')->withNotify($notify);

    }

    public function edit($id)
    {
        $pageTitle = 'Edit Bannerslider';
        $edit = Bannerslider::find($id);
        return view ('admin.bannerslider.edit', compact('pageTitle','edit'));
    }

    public function update(Request $request,$id)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $image->move(public_path('banner'),$imagename);
        }
        $update = Bannerslider::find($id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->save();
        $notify[] = ['success', 'Banner has been updated successfully'];
        return to_route('admin.bannerslider.list')->withNotify($notify);
    }

    public function delete(Request $request)
    {
        $delete = Bannerslider::find($request->id);
        $delete->delete();

        $notify[] = ['success', 'Banner has been deleted successfully'];
        return back()->withNotify($notify);
    }
}
