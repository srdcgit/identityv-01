<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventTitle;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class EventController extends Controller
{
    public function event_title()
    {
        $event_titles = EventTitle::all();
        $pageTitle = 'Event Title';
        return view('admin.event-title.list', compact('pageTitle', 'event_titles'));
    }
    public function addEvent_title()
    {
        $pageTitle = 'Add Event Title';
        return view('admin.event-title.add', compact('pageTitle'));
    }
    public function storeEvent_title(Request $request)
    {
        // dd($request->all());
        $store = new EventTitle();
        $store->title = $request->title;
        $store->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/frontend/event'), $imageName);
            $store->image = $imageName;
        }
        $store->save();
        $notify[] = ['success', 'Event Title Added Successfully'];
        return to_route('admin.event_title.list')->withNotify($notify);
    }
    public function editEvent_title($id)
    {
        $pageTitle = 'Edit Event Title';
        $edit = EventTitle::find($id);
        return view('admin.event-title.edit', compact('pageTitle', 'edit'));
    }
    public function updateEvent_title(Request $request)
    {
        $update = EventTitle::find($request->id);
        $update->title = $request->title;
        $update->description = $request->description;
        if ($request->hasFile('image')) {
            if ($update->image && file_exists(public_path('assets/frontend/event/' . $update->image))) {
                unlink(public_path('assets/frontend/event/' . $update->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/frontend/event'), $imageName);
            $update->image = $imageName;
        }
        $update->save();
        $notify[] = ['success', 'Event Title updated Successfully'];
        return to_route('admin.event_title.list')->withNotify($notify);
    }
    public function deleteEvent_title(Request $request)
    {
        $delete = EventTitle::find($request->id);
        if ($delete) {
            if ($delete->image && file_exists(public_path('assets/frontend/event/' . $delete->image))) {
                unlink(public_path('assets/frontend/event/' . $delete->image));
            }
            $delete->delete();
            Event::where('title_id', $request->id)->delete();
            $notify[] = ['success', 'Deleted successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong'];
        return back()->withNotify($notify);
    }

    //events
    public function list()
    {
        $pageTitle = 'Events';
        $events = Event::with('getEvent')->get();
        return view('admin.events.list', compact('pageTitle', 'events'));
    }
    public function add()
    {
        $pageTitle = 'Add Events';
        $event_titles = EventTitle::all();
        return view('admin.events.add', compact('pageTitle', 'event_titles'));
    }
    // public function store(Request $request){
    //     $store = new Event;
    //     $store->title_id = $request->title_id;
    //     if($request->hasFile('image')){
    //         $image = $request->file('image');
    //         $imageName = time() . '_' . $image->getClientOriginalName();
    //         $image->move(public_path('assets/frontend/event'), $imageName);
    //         $store->image = $imageName;
    //     }
    //     $store->save();
    //     $notify[] = ['success', 'Event Added Successfully'];
    //     return to_route('admin.event.list')->withNotify($notify);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'title_id' => 'required|exists:event_titles,id',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $store = new Event;
        $store->title_id = $request->title_id;

        $images = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/frontend/event'), $imageName);
                $images[] = $imageName;
            }
        }

        // store all image names as JSON in one column
        $store->image = json_encode($images);
        $store->save();

        $notify[] = ['success', 'Event Added Successfully'];
        return to_route('admin.event.list')->withNotify($notify);
    }


    public function edit($id)
    {
        $pageTitle = 'Edit Events';
        $edit = Event::find($id);
        $event_titles = EventTitle::all();
        return view('admin.events.edit', compact('pageTitle', 'edit', 'event_titles'));
    }
    // public function update(Request $request)
    // {
    //     $update = Event::find($request->id);
    //     $update->title_id = $request->title_id;
    //     if ($request->hasFile('image')) {
    //         if ($update->image && file_exists(public_path('assets/frontend/event/' . $update->image))) {
    //             unlink(public_path('assets/frontend/event/' . $update->image));
    //         }
    //         $image = $request->file('image');
    //         $imageName = time() . '_' . $image->getClientOriginalName();
    //         $image->move(public_path('assets/frontend/event'), $imageName);
    //         $update->image = $imageName;
    //     }
    //     $update->save();
    //     $notify[] = ['success', 'Event Updated Successfully'];
    //     return to_route('admin.event.list')->withNotify($notify);
    // }

    public function update(Request $request)
    {
        $request->validate([
            'title_id' => 'required|exists:event_titles,id',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $update = Event::findOrFail($request->id);
        $update->title_id = $request->title_id;
    
        // Remove old images (from storage)
        $decoded = json_decode($update->image, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            foreach ($decoded as $oldImage) {
                $oldPath = public_path('assets/frontend/event/' . $oldImage);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
        } elseif (!empty($update->image)) {
            // Single old image case
            $oldPath = public_path('assets/frontend/event/' . $update->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
    
        // Handle new images
        $newImages = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/frontend/event'), $imageName);
                $newImages[] = $imageName;
            }
        }
    
        // Store only the new images (replace old ones)
        $update->image = json_encode($newImages);
        $update->save();
    
        $notify[] = ['success', 'Event Updated Successfully'];
        return to_route('admin.event.list')->withNotify($notify);
    }
    

    public function delete(Request $request)
    {
        $delete = Event::find($request->id);
        if ($delete) {
            if ($delete->image && file_exists(public_path('assets/frontend/event/' . $delete->image))) {
                unlink(public_path('assets/frontend/event/' . $delete->image));
            }
            $delete->delete();
            $notify[] = ['success', 'Deleted successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong'];
        return back()->withNotify($notify);
    }
}
