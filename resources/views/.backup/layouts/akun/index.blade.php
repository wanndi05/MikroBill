@extends('layouts.app')

@section('content')
<style>
	.mask1 {
	  -webkit-mask-image: url("{{assets('/img/logo-hotspot.png')}}");
	  mask-image: url("{{assets('/img/logo-hotspot.png')}}");
	}
</style>

<div class='card'>
    <div class='row g-0'>
        <div class='col-md-1 mask1' style='padding:3px'>
            <img src="{{assets('/img/bg-vc.png')}}" alt="Cinque Terre" class=img-fluid rounded-start>
        </div>
         <div class='col-md-11'>
            <div class='card-body'>
                <h5 class='card-title'>$mikhmon_name <label class='$mikhmon_status_color' style='padding:5px;border-radius:5px;font-size:10pt'>$mikhmon_status</label></h5>
                <p class='card-text'>$mikhmon_name ($mikhmon_status) $mikhmon_txt</p>
                <a href='$mikhmon_url' target='_self'><button type='button' class='btn btn-outline-primary'>Kunjungi</button></a>
            </div>
        </div>
    </div>
</div>


@endsection