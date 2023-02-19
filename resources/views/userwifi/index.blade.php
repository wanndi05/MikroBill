@extends('layouts.app')
@section('title', 'USERS HOTSPOT')
@section('content')

<div class='container'>
    <style>
    * {
      box-sizing: border-box;
    }

    #myInput {
      background-image: url("{{asset('img/searchicon.png')}}");
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }

    #myTable {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
      font-size: 18px;
    }

    #myTable th, #myTable td {
      text-align: left;
      padding: 12px;
    }

    #myTable tr {
      border-bottom: 1px solid #ddd;
    }

    #myTable tr.header, #myTable tr:hover {
      background-color: #f1f1f1;
    }
    .bg-success-mod{
      background-color: #d1e7dd;
      color: #0f5132;
    }
    </style>
    <body>

    <div class="container">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <div class="justify-content-md-center">
              <div class="animate__animated animate__lightSpeedInLeft"><h2>@yield('title')</h2></div>
            </div>
          </div>
        </div>
            <div class="card-body">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))
              <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                {{ Session::get('alert-' . $msg) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                  @endif
                @endforeach

              <div class="animate__animated animate__lightSpeedInRight" align="left">
                  <h2>
                    <a class="btn btn-primary" href="{{asset('userwifi/create')}}"><i class="material-icons">add_circle</i> Add</a>
                  </h2>
              </div>
                <input class="form-control  animate__animated animate__fadeInUp" type="text" id="myInput" onkeyup="Search()" placeholder="Ketikan Paket..." title="Ketikan Paket">

                <table id="myTable" striped bordered hover variant="dark">
                  <tr class="header">
                  </tr>
                    <th class="animate__animated animate__lightSpeedInLeft">Id Rumah</th>
                    <th class="animate__animated animate__lightSpeedInLeft">Id Paket</th>
                    <th class="animate__animated animate__lightSpeedInLeft">Username</th>
                    <th class="animate__animated animate__lightSpeedInLeft">Password</th>
                    <th class="animate__animated animate__lightSpeedInLeft">Tgl. Kadaluarsa</th>
                    <th class="animate__animated animate__lightSpeedInLeft">Tgl. Bayar Terahir</th>
                    <th class="animate__animated animate__lightSpeedInLeft"></th>
                  @foreach($data as $x)

                  <?php
                    $awal  = date_create($x->updated_at);
                    $akhir = date_create(); // waktu sekarang
                    $interval_states  = date_diff( $awal, $akhir );
                    $get_format_states =$interval_states->y.'tahun'.$interval_states->m.'bulan'.$interval_states->d.'hari'.$interval_states->h.'jam'.$interval_states->i.'menit'.$interval_states->s.'detik';

                    if ($get_format_states=="0tahun0bulan0hari0jam0menit1detik") {
                       $color_stats="bg-success-mod";
                    }elseif ($get_format_states=="0tahun0bulan0hari0jam0menit2detik") {
                       $color_stats="bg-success-mod";
                    }elseif ($get_format_states=="0tahun0bulan0hari0jam0menit3detik") {
                       $color_stats="bg-success-mod";
                    }elseif ($get_format_states=="0tahun0bulan0hari0jam0menit4detik") {
                       $color_stats="bg-success-mod";
                    }elseif ($get_format_states=="0tahun0bulan0hari0jam0menit5detik") {
                       $color_stats="bg-success-mod";
                    }elseif ($get_format_states=="0tahun0bulan0hari0jam0menit6detik") {
                       $color_stats="bg-success-mod";
                    }elseif ($get_format_states=="0tahun0bulan0hari0jam0menit7detik") {
                       $color_stats="bg-success-mod";
                    }elseif ($get_format_states=="0tahun0bulan0hari0jam0menit8detik") {
                       $color_stats="bg-success-mod";
                    }elseif ($get_format_states=="0tahun0bulan0hari0jam0menit9detik") {
                       $color_stats="bg-success-mod";
                    }elseif ($get_format_states=="0tahun0bulan0hari0jam0menit10detik") {
                       $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit11detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit12detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit13detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit14detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit15detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit16detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit17detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit18detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit19detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit20detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit21detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit22detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit23detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit24detik") {
                    //   $color_stats="bg-success-mod";
                    //}elseif ($get_format_states=="0tahun0bulan0hari0jam0menit25detik") {
                    //   $color_stats="bg-success-mod";
                    }else{
                      $color_stats="bg-default";
                    }
                    //echo 'Selisih waktu: '
                    //echo $diff->y . ' tahun, ';
                    //echo $diff->m . ' bulan, ';
                    //echo $diff->d . ' hari, ';
                    //echo $diff->h . ' jam, ';
                    //echo $diff->i . ' menit, ';
                    //echo $diff->s . ' detik, ';
                    //// Output: Selisih waktu: 28 tahun, 5 bulan, 9 hari, 13 jam, 7 menit, 7 detik
                    //echo 'Total selisih hari : ' . $diff->days;
                    // Output: Total selisih hari: 10398
                  ?>
                    <tr class="<?php echo$color_stats ?>">
                        <td class="animate__animated animate__fadeInUp">{{ $x->id_rumah }}</td>
                        <td class="animate__animated animate__fadeInUp">{{ $x->id_paket }}</td>
                        <td class="animate__animated animate__fadeInUp">{{ $x->username }}</td>
                        <td class="animate__animated animate__fadeInUp">{{ $x->password }}</td>
                        <td class="animate__animated animate__fadeInUp">{{ $x->tgl_habis }}</td>
                        <td class="animate__animated animate__fadeInUp">{{ $x->tgl_bayar }}</td>
                        <td class="animate__animated animate__fadeInUp">
                          <div class="btn-group">
                            <a class="btn btn-primary" href="{{asset('userwifi/'.$x->id.'/edit')}}"><i class="material-icons">update</i> Update</a>


                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal{{$x->id}}">
                              <i class="material-icons">delete_forever</i> Delete
                            </button>
                          </div>
                        </td>

                            <!-- The Modal -->
                            <div class="modal fade" id="myModal{{$x->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi !!!</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                  </div>

                                  <!-- Modal body -->
                                  <div class="modal-body">
                                    Apakah kamu ingin menghapus <b>{{$x->nama_paket}}</b>?
                                  </div>

                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                    <a class="btn btn-default" href="{{asset('paketwifi/'.$x->id.'/del')}}">Ya</a>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                                  </div>

                                </div>
                              </div>
                            </div>
                    </tr>
                  @endforeach
                </table>
            </div>
          </div>
        </div>
      </div>

    </body>

    <script>
    function Search() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
    </script>
</div>


@endsection