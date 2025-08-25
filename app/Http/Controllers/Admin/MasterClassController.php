<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category2;
use App\Models\MasterClass;
use App\Models\Stream;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterClassController extends Controller
{
    public function index()
    {
        $pageTitle = 'Masterclass';
        $video = MasterClass::with('category','subcategory')->get();
        return view ('admin.master-class.list', compact('pageTitle','video'));
    }

    public function add()
    {
        $pageTitle = 'Add Masterclass';
        $streams = Stream::all();
        return view('admin.master-class.add', compact('pageTitle','streams'));
    }

    public function Store(Request $request)
    {
        $Store = new MasterClass;
        $Store->stream_id = $request->stream_id;
        $Store->category_id = $request->category_id;
        $Store->category2_id = $request->category2_id;
        $Store->subcategory_id = $request->subcategory_id;
        $Store->title = $request->title;

        if($request->hasFile('video')){
            $video = $request->file('video');
            $videoName = time(). '_' . $video->getClientOriginalName();
            $video->move(public_path('MasterClass'),$videoName);
            $Store->video = $videoName;
        }
        $Store->link = $request->link;
        $Store->save();
        $notify[] = ['success', 'MasterClass has been created successfully'];
        return to_route('admin.Masterclass.index')->withNotify($notify);


    }

    public function edit($id)
    {
        $pageTitle = 'Edit Masterclass';
        $edit = MasterClass::find($id);
        $streams = Stream::all();
        $categories = Category::all();
        $category2 = Category2::all();
        $subcategories = Subcategory::all();
        return view ('admin.master-class.edit', compact('pageTitle','edit','streams', 'categories','category2','subcategories'));
    }

    public function update(Request $request,$id)
    {
        $update =  MasterClass::find($id);
        $update->stream_id = $request->stream_id;
        $update->category_id = $request->category_id;
        $update->category2_id = $request->category2_id;
        $update->subcategory_id = $request->subcategory_id;
        $update->title = $request->title;
        $update->link = $request->link;

        // if($request->hasFile('video')){
        //     if($update->video && file_exists(public_path('MasterClass/'.$update->video))){
        //         unlink(public_path('MasterClass/'.$update->video));
        //     }
        //     $video = $request->file('video');
        //     $videoName = time(). '_' . $video->getClientOriginalName();
        //     $video->move(public_path('MasterClass'),$videoName);
        //     $update->video = $videoName;
        // }
            $update->save();
        $notify[] = ['success', 'MasterClass has been updated successfully'];
        return back()->withNotify($notify);
    }

    public function delete(Request $request)
    {
        $delete = Masterclass::find($request->id);
        $delete->delete();

        $notify[] = ['success', 'Masterclass has been deleted successfully'];
        return back()->withNotify($notify);
    }
}
