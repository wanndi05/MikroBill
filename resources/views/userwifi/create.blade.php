@extends('layouts.app')
@section('title', 'Tambah User Hotspot')
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
							<a href="{{ asset('userwifi') }}" class="btn btn-outline-warning"><i class="material-icons">keyboard_backspace</i> Back</a>
										<button type="reset" class="btn btn-outline-danger"><i class="material-icons">repeat</i> Reset</button>
										<button type="submit" class="btn btn-primary"><i class="material-icons">check</i> Save</button>
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

					<div class="mb-3 animate__animated animate__fadeInUp" hidden>
						<label class="form-label" for="no_urut">Nomor</label>
						<input required="required" type="text" class="form-control" name="no_urut"  value="{{ substr($autokode, -3, 6) }}" readonly style="cursor: not-allowed;">
						<p class="help-block" align="right">{{ $errors->first('no_urut') }}</p>
					</div>

					<div class="mb-3 animate__animated animate__fadeInUp">
						<label class="form-label" for="id_rumah">ID Rumah</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">&#128269;</span>
							</div>
							<input type="text" class="form-control getRumah" placeholder="Cari data ..." autocomplete="off">
						</div>
						
						<div class="input-group mb-3">
							<input required="required" type="text" class="form-control putRumah" style="background-color:#e9ecef;cursor:not-allowed" name="id_rumah" placeholder="&#128274;" autocomplete="off" readonly>
						</div>
						<p class="help-block" align="right">{{ $errors->first('id_rumah') }}</p>
				</div>

				<hr>

					<div class="mb-3 animate__animated animate__fadeInUp">
						<label class="form-label" for="id_paket">ID Paket</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">&#128269;</span>
							</div>
							<input type="text" class="form-control getPaket" placeholder="Cari data ..." autocomplete="off">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">&#128274;</span>
							</div>
							<input required="required" type="text" class="form-control putPaket" style="background-color:#e9ecef;cursor:not-allowed" name="id_paket" placeholder="ID Paket" autocomplete="off" readonly>
						</div>
						<p class="help-block" align="right">{{ $errors->first('id_paket') }}</p>
					</div>

				<hr>
				
					<div class="mb-3 animate__animated animate__fadeInUp">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">&#128100;</span>
							</div>
							<input required="required" type="text" class="form-control" name="username" placeholder="Username">
						</div>
						<p class="help-block" align="right">{{ $errors->first('username') }}</p>
					</div>

					<div class="mb-3 animate__animated animate__fadeInUp">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">&#128273;</span>
							</div>
							<input required="required" type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<p class="help-block" align="right">{{ $errors->first('password') }}</p>
					</div>

					<div class="mb-3 animate__animated animate__fadeInUp">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">&#128197;</span>
							</div>
							<input required="required" autocomplete="off" type="text" class="form-control mikrotik_date" name="tgl_habis" placeholder="Tanggal Kadaluarsa">
						</div>
						<p class="help-block" align="right">{{ $errors->first('tgl_habis') }}</p>
					</div>

					<div class="mb-3 animate__animated animate__fadeInUp">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">&#128197;</span>
							</div>
							<input required="required" autocomplete="off" type="text" class="form-control mikrotik_date" name="tgl_bayar" placeholder="Tanggal pembayaran terakhir">
						</div>
						<p class="help-block" align="right">{{ $errors->first('tgl_bayar') }}</p>
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
							<button type="reset" class="btn btn-outline-danger"><i class="material-icons">repeat</i> Reset</button>
							<button type="submit" class="btn btn-primary"><i class="material-icons">check</i> Save</button>
						</h3>
					</div>
				</div>
			</div>
		</form>
	</div>
 
@endsection