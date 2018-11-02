<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class testcontroller extends Controller
{
    function test_query()
    {
//1        echo "hello";
//2        $data = DB::table('houses')->get();
//        echo "<pre>";
//            print_r($data);

//3        $data = DB::table('houses')
//            ->join('certificates', 'certificates.house_id', '=', 'houses.id')
//            ->select('houses.id', 'houses.address', 'certificates.type', 'certificates.cert_no', 'certificates.issued')
//            ->get();
//                echo "<pre>";
//                print_r($data);

//4        $data = DB::table('houses')
//            ->join('certificates', 'certificates.house_id', '=', 'houses.id')
//            ->select('houses.id', 'houses.address', 'certificates.type', 'certificates.cert_no', 'certificates.issued')
//            ->where('houses.id', '=', '5')
//            ->get();
//            echo "<pre>";
//            print_r($data);

            $data = DB::table('houses')
            ->join('certificates', 'certificates.house_id', '=', 'houses.id')
            ->select('houses.id', 'houses.address', 'certificates.type', 'certificates.cert_no', 'certificates.issued')
            ->get();
            echo "<pre>";
            print_r($data);

}


}
