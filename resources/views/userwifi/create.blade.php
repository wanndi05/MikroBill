@extends('layouts.app')
@section('title', 'USER HOTSPOT | Tambah')
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
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
	    <div class="card">
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
            	<a href="{{ asset('paketwifi') }}" class="btn btn-outline-primary"><i class="material-icons">settings_backup_restore</i> Back</a>
							<button type="reset" class="btn btn-outline-primary">&#8634; Reset</button>
							<button type="submit" class="btn btn-primary">&#10004; Save</button>
            </h2>
          </div>
			  <!--  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
			      @if(Session::has('alert-' . $msg))
				<div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
				  {{ Session::get('alert-' . $msg) }}
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			      @endif
			    @endforeach -->
					@csrf
        	<div class="mb-3 animate__animated animate__fadeInUp" hidden>
					  	<label class="form-label" for="id" readonly="" style="cursor: not-allowed;">ID</label>
					  	<input required="required" type="text" class="form-control" name="id" name="id" value="{{$autokode}}" readonly style="cursor: not-allowed;">
						<p class="help-block" align="right">{{ $errors->first('id') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="no_urut">Nomor</label>
					  <input required="required" type="text" class="form-control" name="no_urut"  value="PRF{{ substr($autokode, -3, 6) }}" readonly style="cursor: not-allowed;">
					  <p class="help-block" align="right">{{ $errors->first('no_urut') }}</p>
					</div>

        	<div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="id_rumah">ID Rumah</label>
					  <input required="required" type="text" class="form-control uppercase" name="id_rumah" placeholder="Isi form ..." autocomplete="off">
					  <p class="help-block" align="right">{{ $errors->first('id_rumah') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="id_paket">ID Paket</label>
					  <input required="required" type="number" class="form-control" name="id_paket" placeholder="input tanpa titik/koma. Contoh : 55000">
					  <p class="help-block" align="right">{{ $errors->first('id_paket') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="username">Username</label>
					  <input required="required" type="number" class="form-control" name="username" placeholder="input tanpa titik/koma. Contoh : 55000">
					  <p class="help-block" align="right">{{ $errors->first('username') }}</p>
			</div>

			<div class="mb-3 animate__animated animate__fadeInUp">
					  <label class="form-label" for="tgl_habis">tgl_habis</label>
					  <input required="required" type="number" class="form-control" name="tgl_habis" placeholder="input tanpa titik/koma. Contoh : 55000">
					  <p class="help-block" align="right">{{ $errors->first('tgl_habis') }}</p>
			</div>

          <div class="mb-3 animate__animated animate__fadeInUp" hidden>
					  <label class="form-label" for="created_at">Dibuat</label>
					  	<?php 
							$datetimenow = date_create()->format('Y-m-d H:i:s');
						?>
					  <input type="text" class="form-control" name="created_at" placeholder="{{ $datetimenow }}" value="{{ $datetimenow }}">
						<p class="help-block" align="right">{{ $errors->first('created_at') }}</p>
					</div>

          <div class="mb-3 animate__animated animate__fadeInUp" hidden>
					  <label class="form-label" for="updated_at">Diupdate</label>
					  <input type="text" class="form-control" name="updated_at" placeholder="{{ $datetimenow }}" value="">
					  <p class="help-block" align="right">{{ $errors->first('updated_at') }}</p>
					</div>
					<div class="mb-3 animate__animated animate__fadeInUp">
						<h3>
							<button type="reset" class="btn btn-outline-primary">&#8634; Reset</button>
							<button type="submit" class="btn btn-primary text-white">&#10004; Save</button>
						</h3>
					</div>
       </div>
     </div>
   </form>
 </div>
@endsection