@extends('layouts.app')
@section('title', 'Ubah Rumah')
@section('content')

    @if($errors->any())
    <div class="alert alert-danger">
    	<ul>
    		@foreach($errors->all() as $error)
    			<li>{{ $error }}</li>
    		@endforeach
    	</ul>
    </div>
    @endif

      @if($message = Session::get('success'))
      <div class="alert alert-success"></div>
      @endif

<?php 
	$datetimenow = date_create()->format('Y-m-d H:i:s');
?>

	<div class="container">
		<form class="form-horizontal" action="{{ asset('datarumah') }}" method="POST" enctype="multipart/form-data">
	    <div class="card bg-dark text-white">
        <div class="card-header">
          <div class="card-title">
            <div class="justify-content-md-center">
              <div class="animate__animated animate__lightSpeedInRight"><h2>@yield('title')</h2></div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="animate__animated animate__lightSpeedInLeft" align="right">
            <h2>
            	<a href="{{ asset('datarumah') }}" class="btn btn-outline-danger"><i class="material-icons">settings_backup_restore</i> Back</a>
							<button type="reset" class="btn btn-outline-warning">&#8634; Reset</button>
							<button type="submit" class="btn btn-primary">&#10004; Save</button>
            </h2>
          </div>
					@csrf
        	<div class="mb-3 animate__animated animate__fadeInUp" hidden>
					  	<label class="form-label" for="id" readonly="" style="cursor: not-allowed;">ID</label>
					  	<input required="required" type="text" class="form-control" name="id" value="{{$data->id}}" readonly style="cursor: not-allowed;">
						<p class="help-block" align="right">{{ $errors->first('id') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp" hidden>
					  <label class="form-label" for="no_urut">Nomor</label>
					  <input required="required" type="text" class="form-control" name="no_urut"  value="{{ substr($data->id, -6, 6) }}" readonly style="cursor: not-allowed;">
					  <p class="help-block" align="right">{{ $errors->first('no_urut') }}</p>
					</div>

        	<div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="nama_rumah">Nama Rumah</label>
					  <input required="required" type="text" class="form-control uppercase" name="nama_rumah" value="{{$data->nama_rumah}}" autocomplete="off">
					  <p class="help-block" align="right">{{ $errors->first('nama_rumah') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="alamat">Alamat</label>
					  <input required="required" type="text" class="form-control" name="alamat" placeholder="Kp. ..... RT. .../... Desa ........ Kecamatan ......... Kabupaten ......" value="{{$data->alamat}}">
					  <p class="help-block" align="right">{{ $errors->first('alamat') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="nomor_hp">Nomor HP</label>
					  <input required="required" type="number" class="form-control" name="nomor_hp" placeholder="628xxxxxxxxxx" value="{{$data->nomor_hp}}">
					  <p class="help-block" align="right">{{ $errors->first('nomor_hp') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="penanggungjawab">Nama Penanggungjawab</label>
					  <input required="required" type="text" class="form-control" name="penanggungjawab" value="{{$data->penanggungjawab}}">
					  <p class="help-block" align="right">{{ $errors->first('penanggungjawab') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="nik">NIK</label>
					  <input required="required" type="number" class="form-control" name="nik" value="{{$data->nik}}">
					  <p class="help-block" align="right">{{ $errors->first('nik') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="npwp">NPWP</label>
					  <input required="required" type="number" class="form-control" name="npwp" value="{{$data->npwp}}">
					  <p class="help-block" align="right">{{ $errors->first('npwp') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="latitude">Latitude</label>
					  <input type="text" class="form-control" name="latitude" placeholder="" value="{{$data->latitude}}">
					  <p class="help-block" align="right">{{ $errors->first('latitude') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="longitude">Longitude</label>
					  <input type="text" class="form-control" name="longitude" placeholder="" value="{{$data->longitude}}">
					  <p class="help-block" align="right">{{ $errors->first('longitude') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp" hidden>
					  <label class="form-label" for="created_at">Dibuat</label>
					  <input type="text" class="form-control" name="created_at" placeholder="{{$data->created_at}}" value="{{$data->created_at}}">
					  <p class="help-block" align="right">{{ $errors->first('created_at') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp" hidden>
					  <label class="form-label" for="updated_at">Diupdate</label>
					  <input type="text" class="form-control" name="updated_at" placeholder="{{ $datetimenow }}" value="">
					  <p class="help-block" align="right">{{ $errors->first('updated_at') }}</p>
					</div>
					<div class="mb-3 animate__animated animate__fadeInUp">
						<h3>
							<button type="reset" class="btn btn-outline-warning">&#8634; Reset</button>
							<button type="submit" class="btn btn-primary text-white">&#10004; Save</button>
						</h3>
					</div>
       </div>
     </div>
   </form>
 </div>
@endsection