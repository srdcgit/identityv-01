<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $pageTitle = 'Brands';
        $logos = Brand::all();
        return view('admin.brand.index', compact('pageTitle','logos'));
    }

    public function store(Request $request)
    {
        $store = new Brand();
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('brand'),$imageName);
            $store->logo = $imageName;
        }
            $store->save();
            $notify[] = ['success', 'Brand logo has been created successfully'];
            return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $update = Brand::find($request->id);
        if($request->hasFile('logo')){
            if($update->logo && file_exists(public_path('brand/' . $update->logo))){
                unlink(public_path('brand/' . $update->logo));
            }
            $image = $request->file('logo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('brand'),$imageName);
            $update->logo = $imageName;
        }
            $update->save();
            $notify[] = ['success', 'Brand logo has been updated successfully'];
            return back()->withNotify($notify);
    }

    public function delete(Request $request)
    {
        $delete = Brand::find($request->id);
        if($delete){
            if($delete->logo && file_exists(public_path('brand/' . $delete->logo))){
                unlink(public_path('brand/' . $delete->logo));
            }
            $delete->delete();
            $notify[] = ['success','Logo has been deleted successfully'];
        } else {
            $notify[] = ['error', 'Logo not found'];
        }
        return back()->withNotify($notify);
    }

}
