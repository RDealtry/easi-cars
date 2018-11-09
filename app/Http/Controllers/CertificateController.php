<?php

namespace App\Http\Controllers;

use App\Certificate;
//use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        Log::info("CertificateController - index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info("CertificateController - create");
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
            Log::info("CertificateController - store");
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
        Log::info("CertificateController - show");
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

            //debugbar??
            // The following works!
            //Log::info("controller edit ");
            //console.log("controller edit")}};
            //Log::info("controller edit ".$result);
            //Log::info($certificate->toJson());

            Log::info("CertificateController - edit");
            Log::info("DOLLARcertificate->house_id = " . $certificate->house_id);

            //This deosn't work
            //window.alert("CertificateController - edit"); //or w script wrapper
            //dd("CertificateController - edit");
            //print_r("CertificateController - edit");
            //{{var_dump("CertificateController - edit")}};
            //var_dump("CertificateController - edit");
            //dump("CertificateController - edit");
            //error_log("CertificateController - edit");

            //Doesn't work
            //<script>
            //    console.log("CertificateController - edit");
            //</script>

//            console.log("CertificateController - edit"); //doesn't work

            $currentHouse = $certificate->house_id;


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
            Log::info("CertificateController - update");
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
            Log::info("CertificateController - destroy");
            Certificate::destroy($certificate->id);

            return response()->json(['success' => 'data is successfully deleted'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
