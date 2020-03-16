<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomCategory;
use App\RoomGallery;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Room::orderBy('updated_at','desc')->where('deleted', 0)->get();
        return view('layouts.room_list')->with('collection', $collection);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection = RoomCategory::orderBy('created_at','desc')->where('deleted', 0)->get();
        return view('layouts/room')->with('categories', $collection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'feature_image' => 'required',
            'feature_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $projector= $request->has('projector')?:0;
        $dashboard=$request->has('dashboard')?:0;
        $handicapped=$request->has('handicapped')?:0;
        $active=$request->has('active')?:0;
        $ready=$request->has('ready')?:0;

        $feature_image ="";
        if ($request->hasfile('feature_image')) {
            $feature_image = mt_rand() . time() . " " . $request->file('feature_image')->getClientOriginalName();
            $request->file('feature_image')->move(public_path('/images/room_feature_image'), $feature_image);
        }
          // dd($feature_image);
        //dd($request->all());
        $room=Room::create([
            'name' => $request->name,
            'category' => $request->category,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'has_projector' => $projector,
            'has_dashboard' => $dashboard,
            'has_handicapped' => $handicapped,
            'is_active' => $active,
            'is_ready' => $ready,
            'feature_image' => $feature_image,
        ]);

        if ($files = $request->file('gallery_image')) {
            foreach ($files as $file) {
                $image_path = mt_rand() . time() . " " . $file->getClientOriginalName();
                $file->move(public_path('/images/room_gallery_image'), $image_path);
                RoomGallery::create([
                    'image' => $image_path,
                    'room' => $room->id,
                ]);
            }
        }
        
        return redirect()->route('room.index')->with('success', 'Room  created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = RoomCategory::where('deleted', '=', 0)->get();
        $item = Room::find($id);
        $gallery_images = RoomGallery::where('room', '=', $id)
        ->where('deleted', '=', 0)->get();
        //dd($item->all());
        return view('layouts.room_update', compact(['categories', 'item', 'gallery_images']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
