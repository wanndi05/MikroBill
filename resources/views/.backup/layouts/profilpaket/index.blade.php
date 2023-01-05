@extends('layouts.app')

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
    </style>
    <body>

        <h2>PAKET WIFI</h2>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Ketikan Paket..." title="Ketikan Paket">

        <table id="myTable">
          <tr class="header">
          </tr>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Harga Resaller</th>
            <th>Masa Aktif</th>
            <th></th>
        @foreach($profilpaket as $x)
            <tr>
                <td>{{ $x->name_paket }}</td>
                <td>{{ number_format($x->price, 2, ",", ".") }}</td>
                <td>{{ number_format($x->reseller_price, 2, ",", ".") }}</td>
                <td>{{ $x->vol_paket }}</td>
                <td><button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Update</button></td>
            </tr>
        @endforeach
        </table>
    </body>

    <script>
    function myFunction() {
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