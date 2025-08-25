<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chatbot;
use App\Models\Country;
use App\Models\Entrance;
use App\Models\Institution;
use App\Models\Module;
use App\Models\Scholarship;
use App\Models\State;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function getModule(Request $request){
        $specificModuleIds = [14, 18, 21, 19];
        $modules = Module::whereIn('id', $specificModuleIds)->get();
        return response()->json($modules);
    }
    public function get_category(Request $request){
        $categories = Category::all();
        return response()->json($categories);
    }
    public function get_subcategory(Request $request){
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }
    public function getScolarship(Request $request){
        $scoholarships = Scholarship::all();
        return response()->json($scoholarships);
    }
    public function getEntranceexam(Request $request){
        $entranceexam = Entrance::where('subcategory_id', $request->subcat_id)->get();
        return response()->json($entranceexam);
    }
    public function getInstitute(Request $request){
        $institute = Institution::where('country_id', $request->country_id)->get();
        return response()->json($institute);
    }
    public function getCountry(){
        $country = Country::all();
        return response()->json($country);
    }
    public function getState(Request $request)
    {
        $state = State::where('country_id',$request->country_id)->get();
        return response()->json($state);
    }
    public function Institute_type(Request $request){
        $institute_type = Institution::where('state_id' , $request->state_id)
        ->where('institute_type' , $request->type_id)->get();
        return response()->json($institute_type);
    }
    public function storeUser(Request $request){
        $request->validate([
            'u_name' => 'required|string|max:255',
            'number' => 'required|digits_between:10,15',
        ]);
        $data = Chatbot::where('u_name',$request->u_name)->where('number',$request->number)->get();
        // dd($data);
        if(count($data) == 0){
            $store = new Chatbot;
            $store->u_name = $request->u_name;
            $store->number = $request->number;
            $store->save();
        } else {
            $store = null;
        }
        return response()->json($store);
    }

}
