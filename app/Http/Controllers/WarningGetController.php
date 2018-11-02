<?php

namespace App\Http\Controllers;

use App\Warning;
use Yajra\DataTables\Facades\DataTables;

class WarningGetController extends Controller
{
    public function index()
    {
        // return DataTables::eloquent(warning::query())->make(true);
        try
        {
            $warnings = Warning::select(['id', 'tenant_id', 'user_id', 'note', 'warning_date', 'reason', 'warning_no', 'manager_yn', 'expiry_date']);
            //$warnings = warning::join('tenants', 'warnings.tenant_id', = '=', 'tenants.id')
            //    ->select('tenant_id', 'note',)
            //    ->get();

            return DataTables::of($warnings)
                ->addColumn(
                    'action', function ($warnings) {
                        return '<button warning_id="' . $warnings->id . '" class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit"></i> Edit</button> <button warning_id="' . $warnings->id . '" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                    }
                )
                ->make(true);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
