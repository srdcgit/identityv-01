<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $pageTitle = 'Country';
        $countries = Country::orderBy('name','asc')->paginate(5);
        return view('admin.country.index', compact('pageTitle','countries'));
    }
    public function store(Request $request){
        $request->validate(['name'=> 'required| unique:countries,name,']);

        $store = new Country;

        $store->name = $request->name;
        $store->save();

        $notify[] = ['success', 'Country has been created successfully'];
        return back()->withNotify($notify);
    }
    public function update(Request $request, $id) {
        $country = Country::find($id);

        $country->name = $request->name;
        $country->save();

        $notify[] = ['success', 'Country has been updated successfully'];
        return back()->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = Country::find($request->id);

        State::where('country_id',$request->id)->delete();
        $delete->delete();
        $notify[] = ['success', 'Country has been deleted successfully'];
        return back()->withNotify($notify);
    }
}
