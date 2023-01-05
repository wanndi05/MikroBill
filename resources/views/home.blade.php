@extends('layouts.app')

@section('content')
                    <!---
                    -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Mikhmon Menu') }}</div>
                <div class="card-body">
                <?php
                    function mikhmonfamily($mikhmon_status, $mikhmon_status_color, $mikhmon_name, $mikhmon_txt, $mikhmon_img, $mikhmon_url, ){
                        echo "  <div class='card'>";
                        echo "      <div class='row g-0'>";
                        echo "          <div class='col-md-1' style='padding:3px'>";
                        echo "              <img src='$mikhmon_img' class='img-fluid rounded-start'>";
                        echo "          </div>";
                        echo "           <div class='col-md-11'>";
                        echo "              <div class='card-body'>";
                        echo "                  <h5 class='card-title'>$mikhmon_name<label class='$mikhmon_status_color' style='padding:5px;border-radius:5px;font-size:10pt'>$mikhmon_status</label></h5>";
                        echo "                  <p class='card-text'>$mikhmon_name ($mikhmon_status) $mikhmon_txt</p>";
                        echo "                  <a href='$mikhmon_url' target='_self'><button type='button' class='btn btn-outline-primary'>Kunjungi</button></a>";
                        echo "              </div>";
                        echo "          </div>";
                        echo "      </div>";
                        echo "  </div>";

                    }

                        mikhmonfamily("Online",
                                        "text-white bg-success",
                                        "Mikhmon V3",
                                        "adalah Mikrotik Hotspot Monitor Versi 3 (tiga) yang berada di hosting dan dapat dijangkau melalui internet.",
                                        "img/mikhmon.png",
                                        "https://mikhmon3.adlinet.web.id");
                        mikhmonfamily("Offline",
                                        "text-white bg-danger",
                                        "Mikhmon V4",
                                        "adalah Mikrotik Hotspot Monitor Versi 4 (empat) yang berada di server pribadi dan hanya dapat dijangkau dalam jaringan tertentu saja.",
                                        "img/mikhmon.png",
                                        "http://103.160.201.196/mikhmonV4");
                        mikhmonfamily("Offline",
                                        "text-white bg-danger",
                                        "Mikhmon V3",
                                        "adalah Mikrotik Hotspot Monitor Versi 3 (tiga) yang berada di server pribadi dan hanya dapat dijangkau dalam jaringan tertentu saja.",
                                        "img/mikhmon.png",
                                        "http://103.160.201.196/mikhmonV3");
                        mikhmonfamily("Online",
                                        "text-white bg-success",
                                        "Mikhmon V4",
                                        "adalah Mikrotik Hotspot Monitor Versi 4 (empat) yang berada di hosting dan dapat dijangkau melalui internet.",
                                        "img/mikhmon.png",
                                        "https://mikhmon4.adlinet.web.id");
                    ?>

              </div>
          </div>
      </div>
  </div>
</div>


@endsection
