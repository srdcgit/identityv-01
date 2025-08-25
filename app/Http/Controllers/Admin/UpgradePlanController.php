<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Upgradeplan;
use Illuminate\Http\Request;

class UpgradePlanController extends Controller
{
    public function list()
    {
        $pageTitle = 'Upgrade Plan';
        $upgrades = Upgradeplan::with('getmodel')->get();
        return view('admin.upgradeplan.list', compact('pageTitle', 'upgrades'));
    }

    public function add()
    {
        $pageTitle = 'Add new Plan';
        $modules = Module::all();
        return view('admin.upgradeplan.add', compact('pageTitle', 'modules'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required',
            'fetures' => 'required',
            'module_id' => 'required',
            'price' => 'required',
        ]);
        $json_module_id = json_encode($request->module_id);
        // dd($json_module_id);

            $store = new Upgradeplan();

            $store->plan_name = $request->plan_name;
            $store->fetures = $request->fetures;
            $store->module_id = $json_module_id;
            $store->price = $request->price;

            $store->save();


        $notify[] = ['success', 'Plan has been created successfully'];
        return to_route('admin.upgradeplan.list')->withNotify($notify);
    }

    public function edit($id)
    {
        $pageTitle = 'Edit Plan';
        $modules = Module::all();
        $edit = Upgradeplan::find($id);
        return view('admin.upgradeplan.edit', compact('edit', 'pageTitle', 'modules'));
    }

    public function update(Request $request)
    {
        $update = Upgradeplan::find($request->id);
        $request->validate([
            'plan_name' => 'required',
            'fetures' => 'required',
            'module_id' => 'required',
            'price' => 'required',
        ]);

        $update->plan_name = $request->plan_name;
        $update->fetures = $request->fetures;
        $update->module_id = $request->module_id;
        $update->price = $request->price;
        $update->save();

        $notify[] = ['success', 'Plan has been updated successfully'];
        return to_route('admin.upgradeplan.list')->withNotify($notify);
    }

    public function delete(Request $request)
    {
        $delete = Upgradeplan::find($request->id);
        if ($delete) {
            $delete->delete();
            $notify[] = ['success', 'Plan has been Deleted successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong.'];
        return back()->withNotify($notify);
    }
}
