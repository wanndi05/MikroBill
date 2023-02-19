<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profilpaket;
use App\Models\Wifirumah;
use App\Models\Userwifi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserwifiController extends Controller
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
        $query = Userwifi::orderBy('id_rumah', 'asc')->get();
        
        $data = new Userwifi;
        return view('userwifi.index', ['data' => $query]);
    }

    
   public function create()
    {
        $dateS = new Carbon('01-01-'.date('Y'));
        $dateE = new Carbon('31-12-'.date('Y'));
        $query = Userwifi::orderBy('created_at', 'asc')->get();

        $data = new Userwifi;
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
            return view('userwifi.create', compact('autokode'), ['data' => $query]);
            return response()->json($data, 200, ['content-type' => 'application/json']);
    }

    public function store(Request $request){
//        dd($request->all());
//        $data = new Userwifi;
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
//        $query = Userwifi::orderBy('created_at', 'desc')->get();
//        return view('userwifi.index', ['data' => $query]);
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
        $data = Userwifi::create($input);
        $request->session()->flash('alert-success', $request->username.' berhasil ditambahkan!!!');

        $query = Userwifi::orderBy('updated_at', 'desc')->get();
        return view('userwifi.index', ['data' => $query]);
    }

    public function edit(Request $request, $id){
        $query = Userwifi::find($id);
        return view('userwifi.update', ['data' => $query]);
    }

    public function update(Request $request, Userwifi $userwifi){
        $userwifi = new Userwifi;
        $userwifi = Userwifi::find($request->id);
        $userwifi->no_urut           =$request->no_urut;
        $userwifi->nama_paket        =$request->nama_paket;
        $userwifi->harga             =$request->harga;
        $userwifi->harga_seller      =$request->harga_seller;
        $userwifi->lama_paket        =$request->lama_paket;
        $userwifi->satuan_lama_paket =$request->satuan_lama_paket;
        $userwifi->created_at        =$request->created_at;
        
        if(!empty($request->updated_at)){
            $input['updated_at'] = $request->updated_at;
        }else{
            $input['updated_at'] = Carbon::now('Asia/Bangkok');
        }
        $userwifi->save();
        $request->session()->flash('alert-success', $request->username.' berhasil diupdate!!!');

        $query = Userwifi::orderBy('updated_at', 'desc')->get();
        return view('userwifi.index', ['data' => $query]);
        //return back();
    }

    public function delete(Request $request, Userwifi $userwifi){
        $userwifi = new Userwifi;
        $userwifi = Userwifi::find($request->id);
        $userwifi->delete();
        $request->session()->flash('alert-success', $request->username.' berhasil dihapus!!!');

        $query = Userwifi::orderBy('updated_at', 'desc')->get();
        return view('userwifi.index', ['data' => $query]);
        //return back();
    }
}
    