<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Careerimage;
use Illuminate\Http\Request;

class CareerImageController extends Controller
{
   public function careerImageList()
   {
      $pageTitle = 'Career Image';
      $careerimage = Careerimage::OrderBy('id', 'desc')->paginate(getPaginate());
      return view('admin.careerimage.list', compact('pageTitle', 'careerimage'));
   }
   public function careerImageAdd()
   {
      $pageTitle = 'Add Career Image';
      return view('admin.careerimage.add', compact('pageTitle'));
   }

   public function careerImageStore(Request $request)
   {
      $careerimage = new Careerimage();
      $careerimage->title = $request->title;

      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageName = time() . '_' . $image->getClientOriginalName();
         $image->move(public_path('careerimages'), $imageName);
         $careerimage->image = $imageName;
      }
      $careerimage->save();
      $notify[] = ['success', 'Career Image created successfully'];
      return to_route('admin.frontend.CareerImageList')->withNotify($notify);
   }

   public function careerImageEdit($id)
   {
      $pageTitle = 'Edit Career Image';
      $careerimage = Careerimage::find($id);
      return view('admin.careerimage.edit', compact('pageTitle', 'careerimage'));
   }
   public function careerImageUpdate(Request $request, $id)
   {
      $careerimage =  Careerimage::findOrFail($id);
      $careerimage->title = $request->title;

      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageName = time() . '_' . $image->getClientOriginalName();
         $image->move(public_path('careerimages'), $imageName);
         $careerimage->image = $imageName;
      }
      $careerimage->save();
      $notify[] = ['success', 'Career Image updated successfully'];
      return to_route('admin.frontend.CareerImageList')->withNotify($notify);
   }
   public function careerImageDelete($id)
   {
      $careerimage = Careerimage::findOrFail($id);
      $careerimage->delete();
      $notify[] = ['success', 'Career Image removed successfully'];
      return back()->withNotify($notify);
   }
}
