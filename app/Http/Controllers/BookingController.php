<?php

namespace App\Http\Controllers;

use App\Booking;
use App\RoomCategory;
use App\BookingCategory;
use App\Client;
use Illuminate\Http\Request;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room_categories = RoomCategory::where('deleted', '=', 0)->get();
        $booking_categories = BookingCategory::where('deleted', '=', 0)->get();
        $clients = Client::where('deleted', '=', 0)->get();
        return view('layouts.booking', compact(['room_categories', 'booking_categories', 'clients']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'category' => 'required',
            'room' => 'required',
            'booking_date' => 'required',
        ]);
    
        if($request->client_form=="show"){ 
            $request->validate([
                'company' => 'required',
            ]);
           
        }
        
        $booking = DB::table('bookings')
        ->where('category', $request->category)
        ->where('room', $request->room)
        ->where('booking_date', $request->booking_date)
        ->get()->first();

        if($booking != null){
            return redirect()->route('booking.create')->with('error', 'This room booked already for selected date.');
        }
        $clientId=null;
        if($request->client_form=="show"){ 
            $client=Client::create([
                'name' => $request->name,
                'company' => $request->company,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            $clientId=$client->id;
        }else{
            $request->validate([
                'client' => 'required',
            ]);
            $clientId=$request->client;
        }

        $booking=Booking::create([
            'category' => $request->category,
            'room' => $request->room,
            'booking_date' => $request->booking_date,
            'description' => $request->description,
            'client' => $clientId,
            'user' => auth()->user()->id
        ]);

        return redirect()->route('booking.index')->with('success', 'Room booked successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
