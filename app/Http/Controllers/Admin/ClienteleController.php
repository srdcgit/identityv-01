<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clientele;
use Illuminate\Http\Request;

class ClienteleController extends Controller
{
    public function index(){
        $pageTitle = 'Clientele';
        $clienteles = Clientele::orderBy('created_at','asc')->paginate('10');
        return view('admin.clientele.list', compact('pageTitle', 'clienteles'));
    }
    public function add(){
        $pageTitle = 'Add Clientele';
        return view('admin.clientele.add', compact('pageTitle'));
    }
    public function store(Request $request){
        $store =new Clientele;
        $store->title = $request->title;
        $store->name = $request->name;
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('assets/frontend/clientele'), $logoName);
            $store->logo = $logoName;
        }
        $store->url = $request->url;
        $store->save();
        $notify[] = ['success', 'Clientele Added Successfully'];
        return to_route('admin.clientele.index')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Clientele';
        $edit = Clientele::find($id);
        return view('admin.clientele.edit', compact('pageTitle', 'edit'));
    }
    public function update(Request $request){
        $update = Clientele::find($request->id);
        $update->title = $request->title;
        $update->name = $request->name;
        if($request->hasFile('logo')){
            if($update->logo && file_exists(public_path('assets/frontend/clientele/' . $update->logo))){
                unlink(public_path('assets/frontend/clientele/' . $update->logo));
            }
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('assets/frontend/clientele'), $logoName);
            $update->logo = $logoName;
        }
        $update->url = $request->url;
        $update->save();
        $notify[] = ['success', 'Clientele Updated Successfully'];
        return to_route('admin.clientele.index')->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = Clientele::find($request->id);
        if($delete){
            $delete->delete();
            $notify[] = ['success', 'Deleted Successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong...'];
        return back()->withNotify($notify);
    }
}
