<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {

         $module = DB::table('app_module')
        ->where('data_status', '=', 'ACTIVE')
        ->get();
        return view('pages.dashboard.index', compact("module"));
    }
    public function user_index()
    {
        return view('pages.dashboard.user_index');
    }
}
