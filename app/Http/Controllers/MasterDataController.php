<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use DataTables;
use DB;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    //DASHBOARD
    public function index()
    {
        $currenturl = URL::current();

        if (Str::contains($currenturl, 'sto')) {
            $active_module = 'sto';
        } elseif (Str::contains($currenturl, 'mdt')) {
            $active_module = 'mdt';
        }

        return view('pages.mdt.dashboard.dashboard', compact("active_module"));
    }
    //REQUEST MASTER DATA
    public function req_mdt()
    {
        $currenturl = URL::current();

        if (Str::contains($currenturl, 'sto')) {
            $active_module = 'sto';
        } elseif (Str::contains($currenturl, 'mdt')) {
            $active_module = 'mdt';
        }



        return view('pages.mdt.request.index', compact("active_module"));
    }
    public function get_request_index_datatables(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('mdt_request')
                // ->where('name', Auth::user()->name)
                ->get();

            return Datatables::of($data)
                // ->editcolumn('date', function($data){
                //     $dt = $data->date;
                //     if ($dt != NULL) {
                //         return Carbon::parse($dt)->format('d/m/Y');
                //     } else {
                //         return "//";
                //     }
                // })
                ->addColumn('action', function ($data) {
                    return view('pages.mdt.request.action_button._action_master', [
                        'model' => $data,
                        // 'url_print' => route('master_asset.print', base64_encode($data->ticket_no)),
                    ]);
                })->rawColumns(['action'])
                ->rawColumns(['status'])
                ->make(true);
        }
    }

    public function get_material_type(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('mdt_mat_type')
                ->get();
            return Datatables::of($data)->make(true);
        }
    }
    public function get_division(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('mdt_division')
                ->get();
            return Datatables::of($data)->make(true);
        }
    }
    public function get_base_unit(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('mdt_buom')
                ->get();
            return Datatables::of($data)->make(true);
        }
    }
    public function get_order_unit(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('mdt_buom')
                ->get();
            return Datatables::of($data)->make(true);
        }
    }
    public function get_material_group(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('mdt_mat_group')
                ->get();
            return Datatables::of($data)->make(true);
        }
    }
    public function get_purchasing_group(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('mdt_purc_group')
                ->get();
            return Datatables::of($data)->make(true);
        }
    }
    //ITEM CODE BUILDER
    public function mc_builder()
    {
        $currenturl = URL::current();

        if (Str::contains($currenturl, 'sto')) {
            $active_module = 'sto';
        } elseif (Str::contains($currenturl, 'mdt')) {
            $active_module = 'mdt';
        }

        return view('pages.mdt.mc_builder.home', compact("active_module"));
    }
}
