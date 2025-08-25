<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class IButtonController extends Controller
{
    public function list()
    {
        $pageTitle = 'Informations';
        $informations = Information::all();
        return view('admin.ibutton.list', compact('pageTitle','informations'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $store = new Information();
        $store->Full_name = $request->name;
        $store->Email  = $request->email ;
        $store->Phone_No = $request->phone;
        $store->Description = $request->note;
        $store->save();

        return redirect()->back();
    }

    public function delete(Request $request){
        $delete = Information::find($request->id);
        $delete->delete();

        return redirect()->back();
    }
}
