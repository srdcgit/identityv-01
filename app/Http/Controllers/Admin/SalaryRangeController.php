<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use App\Models\SalaryRange;
use App\Models\Stream;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SalaryRangeController extends Controller
{
    public function list(){
        $pageTitle = 'Salary Ranges';
        $salary_ranges = SalaryRange::with('getStream','getCategory','getSubcategory','get2Category')->get();
        return view('admin.salary-range.list', compact('pageTitle', 'salary_ranges'));
    }
    public function add(){
        $pageTitle = 'Add Salary Ranges';
        $streams = Stream::all();
        return view('admin.salary-range.add', compact('pageTitle','streams'));
    }
    public function store(Request $request){
        SalaryRange::create($request->all());
        $notify[] = ['success', 'Salary Range has been created successfully'];
        return to_route('admin.salaryrange.list')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Salary Range';
        $streams = Stream::all();
        $categories = Category::all();
        $category2 = Category2::all();
        $subcategories = Subcategory::all();
        $edit = SalaryRange::find($id);
        return view('admin.salary-range.edit', compact('pageTitle','streams', 'edit', 'categories','category2', 'subcategories'));
    }
    public function update(Request $request){
        $update = SalaryRange::find($request->id);
        if($update){
            $update->update($request->all());
            $notify[] = ['success', 'Salary Range has been updated successfully'];
            return to_route('admin.salaryrange.list')->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong...'];
        return back()->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = SalaryRange::find($request->id);
        if($delete){
            $delete->delete();
            $notify[] = ['success', 'Deleted Successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong...'];
        return back()->withNotify($notify);
    }
}
