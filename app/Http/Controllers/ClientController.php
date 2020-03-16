<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
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
        $collection = Client::orderBy('updated_at','desc')->where('deleted', 0)->get();
        return view('layouts.client_list')->with('collection', $collection);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/client');
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
            'company'=>'required',

        ]);

        $name= $request->has('projector')?:null;
        $email=$request->has('dashboard')?:null;
        $phone=$request->has('handicapped')?:null;
        $room=Client::create([
            'name' => $request->name,
            'email' => $email,
            'phone' => $phone,
            'company' => $request->company,
        ]);
        //return view('layouts.roomcat')->with('success', 'Created successfully');;
        return redirect(route('client.index'))->with('success', 'Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
