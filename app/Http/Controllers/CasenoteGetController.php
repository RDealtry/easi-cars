<?php

namespace App\Http\Controllers;

use App\Casenote;
use Yajra\DataTables\Facades\DataTables;

class CasenoteGetController extends Controller
{
    public function index()
    {
        // return DataTables::eloquent(Casenote::query())->make(true);
        try
        {
            $casenotes = casenote::select(['id', 'tenant_id', 'user_id', 'note', 'casenote_date']);

            return DataTables::of($casenotes)
                ->addColumn('action', function ($casenotes) {
                    return '<button casenote_id="' . $casenotes->id . '" class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit"></i> Edit</button> <button casenote_id="' . $casenotes->id . '" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                })
                ->make(true);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
