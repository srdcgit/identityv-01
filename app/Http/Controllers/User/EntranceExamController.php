<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Entrance;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class EntranceExamController extends Controller
{
    public function all()
    {
        $pageTitle = 'Entrance Exam';
        $entrances = Entrance::all();
        $category = Category::all();
        return view('presets.themesFive.user.entrance-exam.index', compact('pageTitle','entrances','category'));
    }

    public function get_entranceexam(Request $request)
    {
        $exam = Entrance::where('exam_name',$request->exam_name)->get();
        // dd($exam);
        return response()->json($exam);
    }

    public function get_entranceexam_by_category(Request $request)
    {
        $category = Entrance::where('category_id',$request->cat_id)->get();
        $subcategory = Subcategory::where('category_id',$request->cat_id)->get();
        // dd($category);
        return response()->json([
            'category' => $category,
            'subcategory' => $subcategory,
        ]);
    }

    public function get_entranceexam_by_subcategory(Request $request)
    {
        $subcategory = Entrance::where('subcategory_id',$request->subcat_id)->get();
        // dd($category);
        return response()->json($subcategory);
    }
}
