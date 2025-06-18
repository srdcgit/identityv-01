<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function TestimonialList()
    {
        $pageTitle = 'Testimonial';
        $testimonials = Testimonial::OrderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.testimonial.list', compact('pageTitle', 'testimonials'));
    }

    public function TestimonialAdd()
    {
        $pageTitle = 'Add Testimonial';
        return view('admin.testimonial.add', compact('pageTitle'));
    }

    public function TestimonialStore(Request $request)
    {

        Testimonial::create([
            'text' => $request->text,
            'video' => $request->video,
        ]);
        $notify[] = ['success', 'Testimonial saved'];
        return redirect()->route('admin.frontend.TestimonialList')->withNotify($notify);
    }

    public function TestimonialEdit($id)
    {
        $pageTitle = 'Edit Testimonial';
        $testimonials = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('pageTitle', 'testimonials'));
    }
    public function TestimonialUpdate(Request $request, $id)
    {
        $testimonials = Testimonial::findOrFail($id);

        $testimonials->update([
            'text' => $request->text,
            'video' => $request->video,
        ]);

        $notify[] = ['success', 'Testimonial updated'];
        return redirect()->route('admin.frontend.TestimonialList')->withNotify($notify);
    }
    public function TestimonialDelete($id)
    {
        $testimonials = Testimonial::findOrFail($id);
        $testimonials->delete();
        $notify[] = ['success', 'Testimonial removed successfully'];
        return back()->withNotify($notify);
    }
}
