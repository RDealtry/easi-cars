<?php

namespace App\Http\Controllers;

use App\Certificate;
use Yajra\DataTables\Facades\DataTables;
//use DB;

class CertificateGetController extends Controller
{
    public function index()
    {
        try
        {

            //$house_list = House::pluck('address', 'id')->toArray();

            $certificates = Certificate::
                leftjoin('houses as houses_certificates', 'houses_certificates.id', '=', 'certificates.house_id')
                ->select(['certificates.id', 'house_id', 'address', 'type', 'cert_no', 'issued']);

            return DataTables::of($certificates)
                ->addColumn(
                    'action', function ($certificates) {
                        return '<button certificate_id="' . $certificates->id . '" class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit"></i> Edit</button> <button certificate_id="' . $certificates->id . '" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                    }
                )
                ->make(true);


        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
