<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use DataTables;
use DB;

class StoController extends Controller
{
    //DASHBOARD
    public function index()
    {
        $currenturl = URL::current();

        if (Str::contains($currenturl, 'sto')) {
            $active_module = 'sto';
        } elseif (Str::contains($currenturl, 'md')) {
            $active_module = 'md';
        }

        return view('pages.sto.dashboard.dashboard', compact("active_module"));
    }
    //MASTER ITEM
    public function master_item()
    {
        $active_module = 'sto';
        // $currenturl = URL::current();

        // if (Str::contains($currenturl, 'sto')) {
        //     $active_module = 'sto';
        // } elseif (Str::contains($currenturl, 'md')) {
        //     $active_module = 'md';
        // }

        return view('pages.sto.master_item.master_item', compact("active_module"));
    }
    public function get_datatables(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('sto_material_master')
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
            ->make(true);
        }
    }
    //COUNT STOCK
    public function count_index()
    {
        $active_module = 'sto';
       
            // dd($data);
        

        return view('pages.sto.count.index', compact("active_module"));
    }
    public function get_stock_datatables(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('sto_count')
            ->join('sto_material_master',  'sto_count.material_id','=','sto_material_master.id')
            ->join('user', 'sto_count.user_id','=', 'user.id')
            ->select('sto_count.*','sto_material_master.*', 'user.name' )
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
            ->make(true);
        }
    }
    //ADMIN SETTINGS
    public function cust_sloc()
    {
        $active_module = 'sto';
       
            // dd($data);
        

        return view('pages.sto.setting_sto.cust_sloc.cust_sloc', compact("active_module"));
    }
    public function get_cust_sloc_datatables(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('sto_setting_cust_slog')
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
            ->make(true);
        }
    }
    //ASSIGN USER STO
    public function assign_user_sto()
    {
        $active_module = 'sto';
       
            // dd($data);
        

        return view('pages.sto.setting_sto.assign_user_sloc.assign_user_sloc', compact("active_module"));
    }
    public function get_user_sloc_datatables(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('sto_user_slog')
            ->join('sto_setting_cust_slog', 'sto_user_slog.cust_sloc_id','sto_setting_cust_slog.id')
            ->join('user', 'sto_user_slog.user_id','user.id')
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
            ->make(true);
        }
    }
}