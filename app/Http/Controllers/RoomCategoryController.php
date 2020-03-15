<?php

namespace App\Http\Controllers;

use App\RoomCategory;
use Illuminate\Http\Request;
use DB;
class RoomCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = RoomCategory::orderBy('updated_at','desc')->where('deleted', 0)->get();
        return view('layouts.roomcat_list')->with('collection', $collection);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/roomcat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:room_categories',
        ]);
        $item = new RoomCategory();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->save();
        //return view('layouts.roomcat')->with('success', 'Created successfully');;
        return redirect(route('roomCategory.create'))->with('success', 'Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RoomCategory $roomCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = RoomCategory::find($id);
        return view('layouts.roomcat_update')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = RoomCategory::find($id);
        $item->name=$request->name;
        $item->description=$request->description;
        $item->save();
        //return view('layouts.roomcat')->with('success', 'Created successfully');;
        return redirect(route('roomCategory.index'))->with('success', 'Updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('room_categories')
            ->where('id', 3)
            ->update(['deleted' => 1]);
        return redirect(route('roomCategory.index'))->with('success', 'Deleted successfully');

    }
}
