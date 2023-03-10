@extends('layouts.app')
@section('title', 'Ubah Paket Wifi')
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

	<div class="container">
		<form class="form-horizontal" action="{{ asset('paketwifi') }}" method="POST" enctype="multipart/form-data">
	    <div class="card bg-dark text-white">
        <div class="card-header">
          <div class="card-title">
            <div class="justify-content-md-center">
              <div class="animate__animated animate__lightSpeedInRight"><h2>@yield('title')</h2></div>
            </div>
          </div>
        </div>
        <div class="card-body">
			  <!--  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
			      @if(Session::has('alert-' . $msg))
				<div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
				  {{ Session::get('alert-' . $msg) }}
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			      @endif
			    @endforeach -->
					@csrf
          <div class="animate__animated animate__lightSpeedInLeft" align="right">
            <h2>
            	<a href="{{ asset('paketwifi') }}" class="btn btn-outline-primary"><i class="material-icons">settings_backup_restore</i> Back</a>
							<button type="reset" class="btn btn-outline-primary">&#8634; Reset</button>
							<button type="submit" class="btn btn-primary">&#10004; Update</button>
            </h2>
          </div>
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
					  <label class="form-label" for="nama_paket">Nama Paket</label>
					  <input required="required" type="text" class="form-control" name="nama_paket" value="{{$data->nama_paket}}" placeholder="Isi form ..." autocomplete="off">
					  <p class="help-block" align="right">{{ $errors->first('nama_paket') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="harga">Harga  (Rp.)</label>
					  <input required="required" type="number" class="form-control" name="harga" value="{{$data->harga}}" placeholder="input tanpa titik/koma. Contoh : 55000">
					  <p class="help-block" align="right">{{ $errors->first('harga') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="harga_seller">Harga Reseller (Rp.)</label>
					  <input required="required" type="number" class="form-control" name="harga_seller" value="{{$data->harga_seller}}" placeholder="input tanpa titik/koma. Contoh : 55000">
					  <p class="help-block" align="right">{{ $errors->first('harga_seller') }}</p>
					</div>

          <div class=" mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="lama_paket">Masa Aktif</label>
					  <div class="input-group">
							<?php
								$datetimenow = date_create()->format('Y-m-d H:i:s');

								$jns_waktu=array(
								 "Jam" => 'Jam',
								 "Hari" => 'Hari',
								 "Bulan" => 'Bulan', 
								  );
							?>

							<select required="required" name="lama_paket" class="form-select">
								<option>{{$data->lama_paket}}</option>
								<?php
									foreach (range(1, 31) as $waktu) {
									    echo '<option value="'.$waktu.'">'.$waktu.'</option>';
									  }
						    ?>
							</select>

							<select required="required" name="satuan_lama_paket" class="form-select">
								<option>{{$data->satuan_lama_paket}}</option>
								<?php
								    asort($jns_waktu);
								    reset($jns_waktu); 
								    foreach($jns_waktu as $p => $w):
								        echo '<option value="'.$p.'">'.$w.'</option>'; //close your tags!!
								    endforeach;
								?>
							</select>

							<!--input required="required" type="number" class="form-control" name="lama_paket" name="lama_paket" placeholder="input tanpa titik/koma"-->
					  </div>
					  <p class="help-block" align="right">{{ $errors->first('lama_paket') }}</p>
					  <p class="help-block" align="right">{{ $errors->first('satuan_lama_paket') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp" hidden>
					  <label class="form-label" for="created_at">Dibuat</label>
					  <input type="text" class="form-control" name="created_at" placeholder="{{ $data->created_at }}" value="{{ $data->created_at }}">
					  <p class="help-block" align="right">{{ $errors->first('created_at') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp" hidden>
					  <label class="form-label" for="updated_at">Diupdate</label>
					  <input type="text" class="form-control" name="updated_at" placeholder="{{ $datetimenow }}">
					  <p class="help-block" align="right">{{ $errors->first('updated_at') }}</p>
					</div>
					<div class="mb-3 animate__animated animate__fadeInUp">
						<h3>
							<button type="reset" class="btn btn-outline-primary">&#8634; Reset</button>
							<button type="submit" class="btn btn-primary">&#10004; Update</button>
						</h3>
					</div>
       </div>
     </div>
   </form>
 </div>
@endsection