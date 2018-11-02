<?php

namespace App\Http\Controllers;

use App\Warning;
use Illuminate\Http\Request;

class WarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('warnings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::pluck('name', 'id');
        // return view('admin.processor.create', ['categories' => $categories]);

        //$tenants = Tenant::pluck('name', 'id');
        //return view('admin.processor.create', ['tenants' => $tenants]);

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
            warning::create($request->all());

            return response()->json(['success' => 'data is successfully added'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function show(Warning $warning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function edit(Warning $warning)
    {
        try
        {
            return response()->json(['success' => 'data is successfully retrieved', 'data' => $warning->toJson()], 200);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warning $warning)
    {
        try
        {
            $warning = warning::findOrFail($warning->id);
            $warning->tenant_id = $request->tenant_id;
            $warning->user_id = $request->user_id;
            $warning->note = $request->note;
            $warning->warning_date = $request->warning_date;
            $warning->reason = $request->reason;
            $warning->warning_no = $request->warning_no;
            $warning->manager_yn = $request->manager_yn;
            $warning->expiry_date = $request->expiry_date;
            $warning->update();

            return response()->json(['success' => 'data is successfully updated'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function destroy(warning $warning)
    {
        try
        {
            warning::destroy($warning->id);

            return response()->json(['success' => 'data is successfully deleted'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
