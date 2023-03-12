<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profilpaket;
use App\Models\Wifirumah;
use App\Models\Userwifi;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateS = new Carbon('01-01-'.date('Y'));
        $dateE = new Carbon('31-12-'.date('Y'));
        $query = Invoice::orderBy('created_at', 'asc')->get();
        
        $data = new Invoice;
        return view('invoice.index', ['data' => $query]);
    }

    public function create()
    {
        $dateS = new Carbon('01-01-'.date('Y'));
        $dateE = new Carbon('31-12-'.date('Y'));
        $query = Invoice::orderBy('created_at', 'asc')->get();

        $data = new Invoice;
        $NewIncrement= substr($query->max('id'), -10, 10);
        $yearE= date('Y');
        $yearS= substr($NewIncrement, -10, 4);


            if ($yearS==$yearE) {
                $urut= substr($NewIncrement, -6, 6)+1;
                $autokode = $yearS.str_pad($urut, 6, 0, STR_PAD_LEFT);
            }elseif ($yearS<$yearE) {
                $yearS=($yearE)-1;
                $selisih=$yearE-$yearS;
                $yearFix=($yearS)+1;
                $urut= substr($NewIncrement, -6, 6)."1";
                $autokode = $yearFix.str_pad($urut, 6, 0, STR_PAD_LEFT);
            }
            return view('invoice.create', compact('autokode'), ['data' => $query]);
            return response()->json($data, 200, ['content-type' => 'application/json']);
    }

    public function store(Request $request){
        $input = $request->all();
        if(!empty($request->created_at)){
            $input['created_at'] = $request->created_at;
        }else{
            $input['created_at'] = Carbon::now('Asia/Bangkok');
        }

        if(!empty($request->updated_at)){
            $input['updated_at'] = $request->updated_at;
        }else{
            $input['updated_at'] = Carbon::now('Asia/Bangkok');
        }

        $input['id'] = $request->id;
        $data = Invoice::create($input);
        $request->session()->flash('alert-success', $request->username.' berhasil ditambahkan!!!');

        $query = Invoice::orderBy('updated_at', 'desc')->get();
        return view('invoice.index', ['data' => $query]);
    }

    public function edit(Request $request, $id){
        $query = Invoice::find($id);
        return view('invoice.update', ['data' => $query]);
    }

    public function update(Request $request, Invoice $invoice){
        $invoice = new Invoice;
        $invoice = Invoice::find($request->id);

        $invoice->no_urut       =$request->no_urut;
        $invoice->username      =$request->username;
        $invoice->id_paket      =$request->id_rumah;
        $invoice->id_paket      =$request->id_paket;
        $invoice->id_paket      =$request->id_user;
        $invoice->tgl_habis     =$request->tgl_habis;
        $invoice->tgl_bayar     =$request->tgl_bayar;
        $invoice->harga         =$request->harga;
        $invoice->harga_seller  =$request->harga_seller;
        $invoice->track_bill    =$request->track_bill;
        $invoice->status        =$request->status;
        $invoice->created_at    =$request->created_at;
        $invoice->updated_at    =$request->updated_at;
        
        if(!empty($request->updated_at)){
            $input['updated_at'] = $request->updated_at;
        }else{
            $input['updated_at'] = Carbon::now('Asia/Bangkok');
        }
        $invoice->save();
        $request->session()->flash('alert-success', $request->username.' berhasil diupdate!!!');

        $query = Invoice::orderBy('updated_at', 'desc')->get();
        return view('invoice.index', ['data' => $query]);
    }

    public function delete(Request $request, Invoice $invoice){
        $invoice = new Invoice;
        $invoice = Invoice::find($request->id);
        $invoice->delete();
        $request->session()->flash('alert-success', $request->username.' berhasil dihapus!!!');

        $query = Invoice::orderBy('updated_at', 'desc')->get();
        return view('invoice.index', ['data' => $query]);
        //return back();
    }

    public function getRumah(Request $request){
        $search = $request->search;

        if($search == ''){
            $invoice = Invoice::orderby('username','asc')->select('id','username','penanggungjawab')->limit(5)->get();
        }else{
            $invoice = Invoice::orderby('username','asc')->select('id','username','penanggungjawab')->where('username', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($invoice as $invoice){
           $response[] = array("value"=>$invoice->id,"label"=>$invoice->username." - ".$invoice->penanggungjawab." - ".$invoice->id);
        }
  
        return response()->json($response); 
     } 

}
