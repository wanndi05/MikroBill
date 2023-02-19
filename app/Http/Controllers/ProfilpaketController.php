<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profilpaket;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProfilpaketController extends Controller
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
        $query = Profilpaket::orderBy('harga', 'asc')->get();
        
        $data = new Profilpaket;
        return view('profilpaket.index', ['data' => $query]);
    }

    public function create()
    {
        $dateS = new Carbon('01-01-'.date('Y'));
        $dateE = new Carbon('31-12-'.date('Y'));
        $query = Profilpaket::orderBy('created_at', 'asc')->get();

        $data = new Profilpaket;
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
            return view('profilpaket.create', compact('autokode'), ['data' => $query]);
            return response()->json($data, 200, ['content-type' => 'application/json']);
    }

    public function store(Request $request){
//        dd($request->all());
//        $data = new Profilpaket;
//        $data->id                =$request->id;
//        $data->no_urut           =$request->no_urut;
//        $data->nama_paket        =$request->nama_paket;
//        $data->harga             =$request->harga;
//        $data->harga_seller      =$request->harga_seller;
//        $data->lama_paket        =$request->lama_paket;
//        $data->satuan_lama_paket =$request->satuan_lama_paket;
//        $data->created_at        =$request->created_at;
//        $data->updated_at        =$request->updated_at;
//        $data->save();
//        $request->session()->flash('alert-success', 'Paket wifi berhasil ditambahkan!!!');
//
//        $query = Profilpaket::orderBy('created_at', 'desc')->get();
//        return view('profilpaket.index', ['data' => $query]);
//        return back();

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
        $data = Profilpaket::create($input);
        $request->session()->flash('alert-success', $request->nama_paket.' berhasil ditambahkan!!!');

        $query = Profilpaket::orderBy('updated_at', 'desc')->get();
        return view('profilpaket.index', ['data' => $query]);
    }

    public function edit(Request $request, $id){
        $query = Profilpaket::find($id);
        return view('profilpaket.update', ['data' => $query]);
    }

    public function update(Request $request, Profilpaket $profilpaket){
        $profilpaket = new Profilpaket;
        $profilpaket = Profilpaket::find($request->id);
        $profilpaket->no_urut           =$request->no_urut;
        $profilpaket->nama_paket        =$request->nama_paket;
        $profilpaket->harga             =$request->harga;
        $profilpaket->harga_seller      =$request->harga_seller;
        $profilpaket->lama_paket        =$request->lama_paket;
        $profilpaket->satuan_lama_paket =$request->satuan_lama_paket;
        $profilpaket->created_at        =$request->created_at;
        
        if(!empty($request->updated_at)){
            $input['updated_at'] = $request->updated_at;
        }else{
            $input['updated_at'] = Carbon::now('Asia/Bangkok');
        }
        $profilpaket->save();
        $request->session()->flash('alert-success', $request->nama_paket.' berhasil diupdate!!!');

        $query = Profilpaket::orderBy('updated_at', 'desc')->get();
        return view('profilpaket.index', ['data' => $query]);
        //return back();
    }

    public function delete(Request $request, Profilpaket $profilpaket){
        $profilpaket = new Profilpaket;
        $profilpaket = Profilpaket::find($request->id);
        $profilpaket->delete();
        $request->session()->flash('alert-success', $request->nama_paket.' berhasil dihapus!!!');

        $query = Profilpaket::orderBy('updated_at', 'desc')->get();
        return view('profilpaket.index', ['data' => $query]);
        //return back();
    }

    public function getPaket(Request $request){
        $search = $request->search;

        if($search == ''){
            $Profilpaket = Profilpaket::orderby('nama_paket','asc')->select('id','nama_paket')->limit(5)->get();
        }else{
            $Profilpaket = Profilpaket::orderby('nama_paket','asc')->select('id','nama_paket')->where('nama_paket', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($Profilpaket as $Profilpaket){
           $response[] = array("value"=>$Profilpaket->id,"label"=>$Profilpaket->nama_paket);
        }
  
        return response()->json($response); 
     } 

}
    