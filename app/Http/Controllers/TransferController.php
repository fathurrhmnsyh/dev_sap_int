<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use DataTables;
use Carbon\Doctrine\CarbonImmutableType;
// use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;


class TransferController extends Controller
{
    //DASHBOARD
    public function index()
    {
        $currenturl = URL::current();

        if (Str::contains($currenturl, 'wtf')) {
            $active_module = 'wtf';
        } elseif (Str::contains($currenturl, 'mdt')) {
            $active_module = 'mdt';
        } elseif (Str::contains($currenturl, 'sto')) {
            $active_module = 'sto';
        }

        return view('pages.wtf.dashboard.dashboard', compact("active_module"));
    }
    public function tp_index()
    {
        $currenturl = URL::current();

        if (Str::contains($currenturl, 'wtf')) {
            $active_module = 'wtf';
        } elseif (Str::contains($currenturl, 'mdt')) {
            $active_module = 'mdt';
        } elseif (Str::contains($currenturl, 'sto')) {
            $active_module = 'sto';
        }

        return view('pages.wtf.wh_transfer.tp_index', compact("active_module"));
    }
    public function validasi_param1(Request $request)
    {
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        // $data = DB::connection('ekanban')->table('ekanban_param_tbl')
        $data = DB::table('ekanban_param_tbl')
            ->where('ekanban_no', $request->val1)
            ->select('ekanban_no')
            ->get();
        // dd($data);

        // dd($data1);
        return response()->json($data);
    }
    public function validasi_param2(Request $request)
    {
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        // $data = DB::connection('ekanban')->table('ekanban_param_tbl')
        $data = DB::table('ekanban_param_tbl')
            ->where('ekanban_no', $request->val2)
            ->select('ekanban_no')
            ->get();
        // dd($data);

        // dd($data1);
        return response()->json($data);
    }

    public function validasi_data1(Request $request)
    {
        $material_code = $request->material_code;
        $from_plant = $request->from_plant;
        $from_sloc = $request->from_sloc;
        $qty_kbn = $request->qty_kanban;

        $url = 'http://erpqas-dp.dharmap.com:8001/sap/zapi/ZMM_TCH_STOCK?sap-client=300&sap-user=dpm-einvc&sap-password=Einvoice01&MATERIAL_NO=' . $material_code . '&PLANT=' . $from_plant . '&SLOC=' . $from_sloc;

        $response = Http::get($url);
        $dt = $response->json();
        // dd($dt);


        if (isset($dt['la_output']['quantity'])) {
            $qty_stock = $dt['la_output']['quantity'];
            $unit = $dt['la_output']['satuan'];
            if ($qty_stock > 0) {
                if ($qty_kbn <= $qty_stock) {
                    // $check_data = DB::connection('ekanban')->table('ekanban_fgin_tbl')
                    $check_data = DB::table('ekanban_fgin_tbl')
                        ->where('kanban_no', $request->kanban_no)
                        ->where('seq', $request->squence)
                        ->get();
                    if (isset($check_data) || empty($check_data)) {
                        $data = "";
                    } else {
                        $data = "Kanban Already Scan!!!";
                    }
                } else {
                    $data = "Qty Material " . $material_code . "\nFrom Sloc " . $from_sloc . " : " . $qty_stock . " " . $unit . ", \nQty Scan Kanban: " . $qty_kbn . " " . $unit . "";
                }
            } elseif ($qty_stock == 0) {
                $data = "Qty material2 " . $material_code . "\nFrom Sloc " . $from_sloc . " : " . $qty_stock . " " . $unit . "";
            } else {
                $data = "Data Not Found";
            }
        } else {

            // Handle situations where la_output or quantity might not exist in the response
            $data = "Data Not Found";
        }

        return response()->json($data);
    }
    public function validasi_data3(Request $request)
    {
        // dd($request);
        // $data = Ekanban_param_tbl::
        // $data = DB::connection('ekanban')->table('ekanban_param_tbl')
        $data = DB::table('ekanban_param_tbl')
            ->where('item_code', $request->item_code)
            ->where('part_no', $request->part_no)
            ->select('id', 'item_code', 'part_no')
            ->first();
        // dd($data);
        return response()->json($data);
    }
    public function get_paramblob_image1(Request $request)
    {
        // dd($request);
        // $data = Ekanban_paramblob_tbl::
        // $data = DB::connection('ekanban')->table('ekanban_paramblob_tbl')
        $data = DB::table('ekanban_paramblob_tbl')
            ->where('id_param', $request->id)
            ->select('img_blob')
            ->first();

        return response()->json($data);

        // dd($data);
    }
    public function validasi_data2(Request $request)
    {
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        // $data = Ekanban_Fgin_tbl::where('kanban_no', $request->kanban_no)
        //     ->where('seq', $request->squence)
        //     ->get();
        // $data = DB::connection('ekanban')->table('ekanban_fgin_tbl')
        $data = DB::table('ekanban_fgin_tbl')
            ->where('kanban_no', $request->kanban_no)
            ->where('seq', $request->squence)
            ->get();
        // dd($data);
        return response()->json($data);
    }
    public function validasi_data4(Request $request)
    {
        // dd($request);
        // $data = Ekanban_param_tbl::
        // $data = DB::connection('ekanban')->table('ekanban_param_tbl')
        $data = DB::table('ekanban_param_tbl')
            ->where('item_code', $request->item_code)
            ->where('part_no', $request->part_no)
            ->select('id', 'item_code', 'part_no')
            ->first();
        // dd($data);
        return response()->json($data);
    }
    public function get_paramblob_image2(Request $request)
    {
        // dd($request);
        // $data = Ekanban_paramblob_tbl::
        // $data = DB::connection('ekanban')->table('ekanban_paramblob_tbl')
        $data = DB::table('ekanban_paramblob_tbl')
            ->where('id_param', $request->id)
            ->select('img_blob')
            ->first();

        return response()->json($data);

        // dd($data);
    }
    public function AddScanIn(Request $request)
    {

        // dd($request);

        $validator = Validator::make($request->all(), [
            'kanban_no.*' => 'required',
            'sq.*' => 'required',
            'part_no.*' => 'required',
            'kode_item.*' => 'required',
            'qty.*' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }
        date_default_timezone_set("Asia/Jakarta");
        $kanban_no = $request->kanban_no;
        $sq = $request->sq;
        $part_no = $request->part_no;
        $kode_item = $request->kode_item;
        $qty = $request->qty;
        $fr_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        // $mp_name = DB::connection('ekanban')->table('ekanban_mperiode_tbl')
        $mp_name = DB::table('ekanban_mperiode_tbl')
            ->where('status', 'ACTIVE')
            ->value('mpname');
        // dd($mp_name);
        // $mp_name = Carbon::now()->format('m-Y');
        $getSession = Auth::user()->user;
        $date = Carbon::now();
        // dd($date);
        $fg_trans = "1";
        $reset = "N";
        $url = 'http://erpqas-dp.dharmap.com:8001/sap/zapi/ZMM_TCH_TRANSFER?sap-client=300&sap-user=dpm-einvc&sap-password=Einvoice01';


        if (count($request->input('kanban_no')) > 0) {
            foreach ($request->input('kanban_no') as $i => $value) {
                $data[] = array(
                    'part_no' => $part_no[$i],
                    'item_code' => $kode_item[$i],
                    'kanban_no' => $value,
                    'seq' => $sq[$i],
                    'qty' => $qty[$i],
                    'mpname' => $mp_name,
                    'created_by' => $getSession,
                    'creation_date' => $date,
                    'fg_trans' => $fg_trans,
                    'reset' => $reset
                );

                $requestData["IT_INPUT"][] = (object)[
                    "MATERIAL" => $kode_item[$i],
                    "PLANT_ASAL" => '1701',
                    "SLOC_ASAL" => $fr_sl[$i], // Sesuai dengan contoh Anda
                    "PLANT_TUJUAN" => '1701',
                    "SLOC_TUJUAN" => $to_sl[$i], // Sesuai dengan contoh Anda
                    "QUANTITY" => $qty[$i],
                    "SATUAN" => "", // Sesuaikan dengan kebutuhan Anda
                ];
            }
            // dd($data, $requestData);
            // dd($requestData);

            // Inser Data

            // To SAP
            $response = Http::post($url, $requestData);
            $dt = $response->json();
            $post_stat_sap = 0;
            $doc_no = '';
            $status = $dt['it_output'][0]['type'];
            if ($status == "S") {
                // DB::connection('ekanban')->table('ekanban_fgin_tbl')->insert($data);
                DB::table('ekanban_fgin_tbl')->insert($data);
                $x = $status;
                $post_stat_sap = 1;
                $doc_no = $dt['it_output'][0]['doc_no'];
            } else {
                $x = $dt['it_output'][0]['message'];
            }
            // $postdata = DB::connection('db_tbs')
            $postdata = DB::table('entry_posting_sap')
            ->insert([
                'transaction_type' => 'ADD',
                'transaction_desc' => 'TP SLOC TO SLOC',
                'url' => $url,
                'data' => json_encode($requestData),
                'response_api' => json_encode($dt['it_output'][0]),
                'created_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 'Fathur',
                'status_to_sap' => $post_stat_sap,
                'doc_no' => $doc_no
                
            ]);
            return response()->json($x);
        }

        // original
        // if (count($request->input('kanban_no')) > 0) {
        //     foreach ($request->input('kanban_no') as $i => $value) {
        //         $data = array(
        //             'part_no' => $part_no[$i],
        //             'item_code' => $kode_item[$i],
        //             'kanban_no' => $value,
        //             'seq' => $sq[$i],
        //             'qty' => $qty[$i],
        //             'mpname' => $mp_name,
        //             'created_by' => $getSession,
        //             'creation_date' => $date,
        //             'fg_trans' => $fg_trans,
        //             'reset' => $reset
        //         );



        //         $url = 'http://erpqas-dp.dharmap.com:8001/sap/zapi/ZMM_TCH_TRANSFER?sap-client=300&sap-user=dpm-einvc&sap-password=Einvoice01';

        //         // $requestData = [
        //         //     "IT_INPUT" => [
        //         //         [
        //         //             // "MATERIAL" => $kode_item,
        //         //             "MATERIAL" => $data['item_code'],
        //         //             "PLANT_ASAL" => "1701",
        //         //             "SLOC_ASAL" => $fr_sl,
        //         //             "PLANT_TUJUAN" => "1701",
        //         //             "SLOC_TUJUAN" => $to_sl,
        //         //             "QUANTITY" => $data['qty'],
        //         //             "SATUAN" => "",
        //         //         ]
        //         //     ]
        //         // ];
        //         /////////////////////////////////////////////
        //         $requestData = [
        //             "IT_INPUT" => [],
        //         ];

        //         for ($i = 0; $i < count($kode_item); $i++) {
        //             $requestData["IT_INPUT"][] = (object)[
        //                 "MATERIAL" => $kode_item[$i],
        //                 "PLANT_ASAL" => '1701',
        //                 "SLOC_ASAL" => $fr_sl[$i], // Sesuai dengan contoh Anda
        //                 "PLANT_TUJUAN" => '1701',
        //                 "SLOC_TUJUAN" => $to_sl[$i], // Sesuai dengan contoh Anda
        //                 "QUANTITY" => $qty[$i],
        //                 "SATUAN" => "", // Sesuaikan dengan kebutuhan Anda
        //             ];
        //         }

        //         // dd($requestData);

        //         /////////////////////////////////////

        //         // $requestData["IT_INPUT"][] = [
        //         //     "MATERIAL" => $kode_item,
        //         //     "PLANT_ASAL" => "1701",
        //         //     "SLOC_ASAL" => $fr_sl,
        //         //     "PLANT_TUJUAN" => "1701",
        //         //     "SLOC_TUJUAN" => $to_sl,
        //         //     "QUANTITY" => $qty,
        //         //     "SATUAN" => "",
        //         // ];
        //         // dd($requestData);



        //         $response = Http::post($url, $requestData);
        //         $dt = $response->json();
        //         $status = $dt['it_output'][0]['type'];
        //         // dd($status);
        //         if ($status == "S") {
        //             foreach($requestData["IT_INPUT"] as $a) {
        //                 DB::connection('ekanban')->table('ekanban_fgin_tbl')->insert((array)$a);
        //             }
        //             $x = $status;
        //         } else {
        //             $x = $dt['it_output'][0]['message'];
        //         }
        //         return response()->json($x);
        //     }
        // }

        //     foreach ($kanban_no as $i => $value) {
        //         // Check if the kanban_no is already in the $quantityByKanban array
        //         if (isset($quantityByKanban[$value])) {
        //             // If it is, add the quantity to the existing value
        //             $quantityByKanban[$value] += $qty[$i];
        //         } else {
        //             // If it's not, initialize it with the current quantity
        //             $quantityByKanban[$value] = $qty[$i];
        //         }
        //     }
        //     $summarizedData = [];

        //     foreach ($quantityByKanban as $kanban => $quantity) {
        //          // Cast quantity to an integer to remove the quotes
        //         //$quantity = (int)$quantity;
        //         $quantity = strval($quantity);
        //         // Add the summarized data to the new array
        //         $summarizedData[] = [
        //             'kanban_no' => $kanban,
        //             'total_quantity' => $quantity,
        //         ];
        //     }



        // }
        // return response()->json($summarizedData);


        // return response()->json([
        //     'status' => 'Successfully Add'
        // ]);


    }
    public function CheckScanIn(Request $request)
    {
        $sqValues = $request->input('sq');
        $kbValues = $request->input('kanban_no');
        // dd($kanbanValues);
        //Mengecek setiap nilai "sq" di database
        foreach ($sqValues as $sq) {
            // $existingItems = DB::connection('ekanban')->table('ekanban_fgin_tbl')
            $existingItems = DB::table('ekanban_fgin_tbl')
                ->whereIn('kanban_no', $kbValues)
                ->whereIn('seq', $sqValues)
                ->get(['kanban_no', 'seq']);
            // Menghitung item yang sudah ada
            $existingCount = count($existingItems);
            // dd($existingCount);


            // Jika ada item yang sudah ada, Anda dapat melakukan sesuatu di sini
            if ($existingCount > 0) {
                return response()->json([
                    // 'message' => 'Kanban Ini Sudah di Scan!! Silahkan keluarkan barang dan scan ulang',
                    $existingItems,
                ]);
            } else {
                return response()->json('Valid');
            }
            // Lanjutkan proses jika tidak ada error

        }
    }
    //TRANSFER POSTING RAW MATERIAL

    public function tp_rm()
    {
        $currenturl = URL::current();

        if (Str::contains($currenturl, 'wtf')) {
            $active_module = 'wtf';
        } elseif (Str::contains($currenturl, 'mdt')) {
            $active_module = 'mdt';
        } elseif (Str::contains($currenturl, 'sto')) {
            $active_module = 'sto';
        }

        return view('pages.wtf.wh_transfer.raw_mat.tp_rm_index', compact("active_module"));
    }
    public function validasi_param_rcm_1(Request $request)
    {
        // dd($request);
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        // $data = DB::connection('ekanban')->table('ekanban_param_tbl')
        $data = DB::table('ekanban_param_tbl')
            ->where('item_code', $request->val2)
            ->select('item_code')
            ->get();
        // dd($data);

        // dd($data1);
        return response()->json($data);
    }
    public function validasi_data_rcm_1(Request $request)
    {
        // dd($request);
        $material_code = $request->material;
        $from_plant = $request->from_plant;
        $from_sloc = $request->from_sloc;
        $qty_kbn = $request->quantity;

        $url = 'http://erpqas-dp.dharmap.com:8001/sap/zapi/ZMM_TCH_STOCK?sap-client=300&sap-user=dpm-einvc&sap-password=Einvoice01&MATERIAL_NO=' . $material_code . '&PLANT=' . $from_plant . '&SLOC=' . $from_sloc;

        $response = Http::get($url);
        $dt = $response->json();
        // dd($dt);


        if (isset($dt['la_output']['quantity'])) {
            $qty_stock = $dt['la_output']['quantity'];
            $unit = $dt['la_output']['satuan'];
            if ($qty_stock > 0) {
                if ($qty_kbn <= $qty_stock) {
                    // $check_data = DB::connection('ekanban')->table('ekanban_fgin_tbl')
                    $check_data = DB::table('ekanban_fgin_tbl')
                        ->where('kanban_no', $request->kanban_no)
                        ->where('seq', $request->squence)
                        ->get();
                    if (isset($check_data) || empty($check_data)) {
                        $data = "";
                    } else {
                        $data = "Kanban Already Scan!!!";
                    }
                } else {
                    $data = "Qty Material " . $material_code . "\nFrom Sloc " . $from_sloc . " : " . $qty_stock . " " . $unit . ", \nQty Scan Kanban: " . $qty_kbn . " " . $unit . "";
                }
            } elseif ($qty_stock == 0) {
                $data = "Qty material2 " . $material_code . "\nFrom Sloc " . $from_sloc . " : " . $qty_stock . " " . $unit . "";
            } else {
                $data = "Data Not Found";
            }
        } else {

            // Handle situations where la_output or quantity might not exist in the response
            $data = "Data Not Found";
        }

        return response()->json($data);
    }
    public function validasi_data_rcm_3(Request $request)
    {
        // dd($request);
        // $data = Ekanban_param_tbl::
        // $data = DB::connection('ekanban')->table('ekanban_param_tbl')
        $data = DB::table('ekanban_param_tbl')
            ->where('item_code', $request->material)
            // ->where('part_no', $request->part_no)
            // ->select('id', 'item_code', 'part_no')
            ->select('id', 'item_code')
            ->first();
        // dd($data);
        return response()->json($data);
    }
    public function validasi_param_rcm_2(Request $request)
    {
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        // $data = DB::connection('ekanban')->table('ekanban_param_tbl')
        $data = DB::table('ekanban_param_tbl')
            ->where('item_code', $request->val2)
            ->select('item_code')
            ->get();
        // dd($data);

        // dd($data1);
        return response()->json($data);
    }
    public function validasi_data_rcm_2(Request $request)
    {
        // dd($request);
        // $kanban = DB::connection('db_tbs')->table('ekanban_fgin_tbl')
        // $data = Ekanban_Fgin_tbl::where('kanban_no', $request->kanban_no)
        //     ->where('seq', $request->squence)
        //     ->get();
        // $data = DB::connection('ekanban')->table('ekanban_fgin_tbl')
        $data = DB::table('ekanban_fgin_tbl')
            ->where('item_code', $request->material)
            ->where('seq', $request->sequence)
            ->get();
        dd($data);
        return response()->json($data);
    }
    public function CheckScanRMC(Request $request)
    {
        // dd($request);
        // $sqValues = $request->input('sq');
        // $kbValues = $request->input('kanban_no');
        $material = $request->input('material');
        $sequence = $request->input('sequence');

        // dd($kanbanValues);
        //Mengecek setiap nilai "sq" di database
        foreach ($sequence as $sq) {
            // $existingItems = DB::connection('ekanban')->table('ekanban_fgin_tbl')
            $existingItems = DB::table('ekanban_fgin_tbl')
                ->whereIn('item_code', $material)
                ->whereIn('seq', $sequence)
                ->get(['item_code', 'seq']);
            // Menghitung item yang sudah ada
            $existingCount = count($existingItems);
            // dd($existingCount);


            // Jika ada item yang sudah ada, Anda dapat melakukan sesuatu di sini
            if ($existingCount > 0) {
                return response()->json([
                    // 'message' => 'Kanban Ini Sudah di Scan!! Silahkan keluarkan barang dan scan ulang',
                    $existingItems,
                ]);
            } else {
                return response()->json('Valid');
            }
            // Lanjutkan proses jika tidak ada error

        }
    }
    public function AddScanRMC(Request $request)
    {

        // dd($request);

        $validator = Validator::make($request->all(), [
            'material.*' => 'required',
            'sequence.*' => 'required',
            'quantity.*' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }
        date_default_timezone_set("Asia/Jakarta");
        // $kanban_no = $request->kanban_no;
        $kode_item = $request->material;
        $sq = $request->sequence;
        $qty = $request->quantity;
        $fr_sl = $request->from_sloc;
        $to_sl = $request->to_sloc;
        $fr_pl = $request->from_plant;
        $to_pl = $request->to_plant;
        // $mp_name = DB::connection('ekanban')->table('ekanban_mperiode_tbl')
        $mp_name = DB::table('ekanban_mperiode_tbl')
            ->where('status', 'ACTIVE')
            ->value('mpname');
        // dd($mp_name);
        // $mp_name = Carbon::now()->format('m-Y');
        $getSession = Auth::user()->user;
        $date = Carbon::now();
        // dd($date);
        $fg_trans = "1";
        $reset = "N";
        $url = 'http://erpqas-dp.dharmap.com:8001/sap/zapi/ZMM_TCH_TRANSFER?sap-client=300&sap-user=dpm-einvc&sap-password=Einvoice01';


        if (count($request->input('material')) > 0) {
            foreach ($request->input('material') as $i => $value) {
                $data[] = array(
                    // 'part_no' => $part_no[$i],
                    'item_code' => $kode_item[$i],
                    // 'kanban_no' => $value,
                    'seq' => $sq[$i],
                    'qty' => $qty[$i],
                    'mpname' => $mp_name,
                    'created_by' => $getSession,
                    'creation_date' => $date,
                    'fg_trans' => $fg_trans,
                    'reset' => $reset
                );

                $requestData["IT_INPUT"][] = (object)[
                    "MATERIAL" => $kode_item[$i],
                    "PLANT_ASAL" => $fr_pl[$i],
                    "SLOC_ASAL" => $fr_sl[$i], // Sesuai dengan contoh Anda
                    "PLANT_TUJUAN" => $to_pl[$i],
                    "SLOC_TUJUAN" => $to_sl[$i], // Sesuai dengan contoh Anda
                    "QUANTITY" => $qty[$i],
                    "SATUAN" => "", // Sesuaikan dengan kebutuhan Anda
                ];
            }
            // dd($data, $requestData);
            // dd($requestData);

            // Inser Data

            // To SAP
            $response = Http::post($url, $requestData);
            $dt = $response->json();
            $post_stat_sap = 0;
            $doc_no = '';
            $status = $dt['it_output'][0]['type'];
            if ($status == "S") {
                // DB::connection('ekanban')->table('ekanban_fgin_tbl')->insert($data);
                DB::table('ekanban_fgin_tbl')->insert($data);
                $x = $status;
                $post_stat_sap = 1;
                $doc_no = $dt['it_output'][0]['doc_no'];
            } else {
                $x = $dt['it_output'][0]['message'];
            }
            // $postdata = DB::connection('db_tbs')
            $postdata = DB::table('entry_posting_sap')
            ->insert([
                'transaction_type' => 'ADD',
                'transaction_desc' => 'TP SLOC TO SLOC',
                'url' => $url,
                'data' => json_encode($requestData),
                'response_api' => json_encode($dt['it_output'][0]),
                'created_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_by' => 'Fathur',
                'status_to_sap' => $post_stat_sap,
                'doc_no' => $doc_no
                
            ]);
            return response()->json($x);
        }}

}
