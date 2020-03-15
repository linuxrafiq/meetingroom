<?php

namespace App\Http\Controllers;

use App\BookingCategory;
use Illuminate\Http\Request;
use DB;
class BookingCategoryController extends Controller
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
        $collection = BookingCategory::orderBy('updated_at','desc')->where('deleted', 0)->get();
        return view('layouts.bookingcat_list')->with('collection', $collection);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/bookingcat');
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
            'name'=>'required|unique:booking_categories',
        ]);
        $item = new BookingCategory();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->save();
        //return view('layouts.roomcat')->with('success', 'Created successfully');;
        return redirect(route('bookingCategory.create'))->with('success', 'Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookingCategory  $bookingCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BookingCategory $bookingCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookingCategory  $bookingCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BookingCategory::find($id);
        return view('layouts.bookingcat_update')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookingCategory  $bookingCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = BookingCategory::find($id);
        $item->name=$request->name;
        $item->description=$request->description;
        $item->save();
        //return view('layouts.roomcat')->with('success', 'Created successfully');;
        return redirect(route('bookingCategory.index'))->with('success', 'Updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookingCategory  $bookingCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('booking_categories')
        ->where('id', $id)
        ->update(['deleted' => 1]);
        return redirect(route('bookingCategory.index'))->with('success', 'Deleted successfully');

    }
}
