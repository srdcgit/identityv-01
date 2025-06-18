<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(){
        $pageTitle = 'Districts';
        $states = State::orderBy('name','asc')->get();

        $districts = District::orderBy('name','asc')->paginate(5);
        return view('admin.district.index', compact('pageTitle','states','districts'));
    }
    public function store(Request $request){
        $request->validate(['name'=> 'required| unique:districts,name,']);

        $store = new District;

        $store->name = $request->name;
        $store->state_id = $request->state_id;
        $store->save();

        $notify[] = ['success', 'District has been created successfully'];
        return back()->withNotify($notify);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:districts,name,' . $id,
            'state_id' => 'required|exists:states,id'
        ]);

        $update = District::find($id);

        $update->name = $request->name;
        $update->state_id = $request->state_id;
        $update->save();

        $notify[] = ['success', 'District has been updated successfully'];
        return back()->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = District::find($request->id);
        $delete->delete();

        $notify[] = ['success', 'District has been deleted successfully'];
        return back()->withNotify($notify);
    }
    public function getDistrict(Request $request){
        $getDistrict = District::where('state_id', $request->state_id)->get();

        return response()->json($getDistrict);
    }
}
