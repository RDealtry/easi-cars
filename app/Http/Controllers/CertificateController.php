<?php

namespace App\Http\Controllers;

use App\Certificate;
//use App\House;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('certificates.index');
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
            Certificate::create($request->all());

            return response()->json(['success' => 'data is successfully added'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        try
        {
            //$MyHouse = \App\Certificate::find('id'); // Doesn't work - always null
            //return response()->json(['success' => 'data is successfully retrieved', 'data' => $certificate->toJson()], 200);

            //$house_list = House::pluck('address', 'id')->toArray(); // to create the select list
            //$current_house = Input::old('house') ? Input::old('house') : $certificate->house->id;

            //$current_house = house::get();

            //return response()->json(['success' => 'data is successfully retrieved', 'data' => $certificate->toJson()], 200, 'current_house' => $current_house);
            //return response()->json(['success' => 'data is successfully retrieved', 'data' => $certificate->toJson(), 'current_house' => $current_house], 200);
            //return response()->json(['success' => 'data is successfully retrieved', 'data' => $certificate->toJson(), 'MyHouse' => $MyHouse], 200);

            return response()->json(['success' => 'data is successfully retrieved', 'data' => $certificate->toJson()], 200);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.

     * @param  \Illuminate\Http\Request  $request
     * @param  int\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        try
        {
            $certificate = Certificate::findOrFail($certificate->id);
            $certificate->house_id = $request->house_id;
            $certificate->type = $request->type;
            $certificate->cert_no = $request->cert_no;
            $certificate->issued = $request->issued;
            $certificate->update();
            $current_house = $certificate->house_id;

            return response()->json(['success' => 'data is successfully updated'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int/Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        try
        {
            Certificate::destroy($certificate->id);

            return response()->json(['success' => 'data is successfully deleted'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
