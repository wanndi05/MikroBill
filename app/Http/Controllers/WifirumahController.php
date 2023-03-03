<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profilpaket;
use App\Models\Wifirumah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WifirumahController extends Controller
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
        $query = Wifirumah::orderBy('created_at', 'asc')->get();
        
        $data = new Wifirumah;
        return view('rumah.index', ['data' => $query]);
    }

    public function create()
    {
        $dateS = new Carbon('01-01-'.date('Y'));
        $dateE = new Carbon('31-12-'.date('Y'));
        $query = Wifirumah::orderBy('created_at', 'asc')->get();

        $data = new Wifirumah;
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
            return view('rumah.create', compact('autokode'), ['data' => $query]);
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
        $data = Wifirumah::create($input);
        $request->session()->flash('alert-success', $request->nama_rumah.' berhasil ditambahkan!!!');

        $query = Wifirumah::orderBy('updated_at', 'desc')->get();
        return view('rumah.index', ['data' => $query]);
    }

    public function edit(Request $request, $id){
        $query = Wifirumah::find($id);
        return view('rumah.update', ['data' => $query]);
    }

    public function update(Request $request, Wifirumah $wifirumah){
        $wifirumah = new Wifirumah;
        $wifirumah = Wifirumah::find($request->id);
        $wifirumah->no_urut           =$request->no_urut;
        $wifirumah->nama_rumah        =$request->nama_rumah;
        $wifirumah->alamat            =$request->alamat;
        $wifirumah->nomor_hp          =$request->nomor_hp;
        $wifirumah->penanggungjawab   =$request->penanggungjawab;
        $wifirumah->nik               =$request->nik;
        $wifirumah->npwp              =$request->npwp;
        $wifirumah->latitude          =$request->latitude;
        $wifirumah->longitude         =$request->longitude;
        $wifirumah->created_at        =$request->created_at;
        $wifirumah->updated_at        =$request->updated_at;
        
        if(!empty($request->updated_at)){
            $input['updated_at'] = $request->updated_at;
        }else{
            $input['updated_at'] = Carbon::now('Asia/Bangkok');
        }
        $wifirumah->save();
        $request->session()->flash('alert-success', $request->nama_rumah.' berhasil diupdate!!!');

        $query = Wifirumah::orderBy('updated_at', 'desc')->get();
        return view('rumah.index', ['data' => $query]);
    }

    public function delete(Request $request, Wifirumah $wifirumah){
        $wifirumah = new Wifirumah;
        $wifirumah = Wifirumah::find($request->id);
        $wifirumah->delete();
        $request->session()->flash('alert-success', $request->nama_rumah.' berhasil dihapus!!!');

        $query = Wifirumah::orderBy('updated_at', 'desc')->get();
        return view('rumah.index', ['data' => $query]);
        //return back();
    }

    public function getRumah(Request $request){
        $search = $request->search;

        if($search == ''){
            $Wifirumah = Wifirumah::orderby('nama_rumah','asc')->select('id','nama_rumah','penanggungjawab')->limit(5)->get();
        }else{
            $Wifirumah = Wifirumah::orderby('nama_rumah','asc')->select('id','nama_rumah','penanggungjawab')->where('nama_rumah', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($Wifirumah as $wifirumah){
           $response[] = array("value"=>$wifirumah->id,"label"=>$wifirumah->nama_rumah." - ".$wifirumah->penanggungjawab." - ".$wifirumah->id);
        }
  
        return response()->json($response); 
     } 

}
    