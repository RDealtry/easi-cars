<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('houses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            House::create($request->all());

            return response()->json(['success' => 'data is successfully added'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\House $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int\House $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        try
        {
            return response()->json(['success' => 'data is successfully retrieved', 'data' => $house->toJson()], 200);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int\House $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        try
        {
            $house = House::findOrFail($house->id);
            $house->address = $request->address;
            $house->postcode = $request->postcode;
            $house->live_date = $request->live_date;
            $house->no_rooms = $request->no_rooms;
            $house->gender = $request->gender;
            $house->landlord = $request->landlord;
            $house->dead_date = $request->dead_date;
            $house->update();

            return response()->json(['success' => 'data is successfully updated'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int/House $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        try
        {
            House::destroy($house->id);

            return response()->json(['success' => 'data is successfully deleted'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
