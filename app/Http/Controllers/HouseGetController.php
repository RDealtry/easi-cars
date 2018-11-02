<?php

namespace App\Http\Controllers;

use App\House;
use Yajra\DataTables\Facades\DataTables;

class HouseGetController extends Controller
{
    public function index()
    {
        // return DataTables::eloquent(House::query())->make(true);
        try
        {
            $houses = House::select(['id', 'address', 'postcode', 'live_date', 'no_rooms', 'gender', 'landlord', 'dead_date']);

            return DataTables::of($houses)
                ->addColumn(
                    'action', function ($houses) {
                        return '<button house_id="' . $houses->id . '" class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit"></i> Edit</button> <button house_id="' . $houses->id . '" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                    }
                )
                ->make(true);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
