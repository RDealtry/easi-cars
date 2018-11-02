<?php

namespace App\Http\Controllers;

use App\Casenote;
use Illuminate\Http\Request;

class CasenoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('casenotes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            Casenote::create($request->all());

            return response()->json(['success' => 'data is successfully added'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Casenote  $casenote
     * @return \Illuminate\Http\Response
     */
    public function show(Casenote $casenote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Casenote  $casenote
     * @return \Illuminate\Http\Response
     */
    public function edit(Casenote $casenote)
    {
        try
        {
            return response()->json(['success' => 'data is successfully retrieved', 'data' => $casenote->toJson()], 200);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Casenote  $casenote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Casenote $casenote)
    {
        try
        {

            $casenote = Casenote::findOrFail($casenote->id);
            $casenote->tenant_id = $request->tenant_id;
            $casenote->user_id = $request->user_id;
            $casenote->note = $request->note;
            $casenote->casenote_date = $request->casenote_date;
            $casenote->update();

            return response()->json(['success' => 'data is successfully updated'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Casenote  $casenote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Casenote $casenote)
    {
        try
        {
            Casenote::destroy($casenote->id);

            return response()->json(['success' => 'data is successfully deleted'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
