<link rel="stylesheet" href="{{ asset('css/w3.css') }}">
<style>

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
}

.img-sidebar{
    height: 50px;
}
</style>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right w3-animate-left sidenav" style="display:none" id="mySidebar">
    <button onclick="w3_close()" class="w3-bar-item w3-large">
        <span class="w3-button w3-xlarge close" aria-label="Close" aria-hidden="true">&times;</span>
        <img class="img-sidebar" src="{{asset('img/logo-apply.png')}}">
        <!--{{ config('app.name', 'Laravel') }}--->
    </button>
  <a href="#" class="w3-bar-item w3-button">AKUN</a>
    <button class="dropdown-btn">Paket Wifi 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="{{ asset('/price') }}">Data Paket</a>
        <a href="#">Tambah Paket</a>
      </div>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>


<!-- Page Content -->
<div>
  <button class="w3-button w3-xlarge" onclick="w3_open()">☰ <img class="img-sidebar" src="{{asset('img/logo-apply.png')}}"> </button>
  <!--div class="w3-container">
    <h1>My Page</h1>
  </div-->
</div>

<!--div class="w3-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mikhmon Menu') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<img src="img_car.jpg" alt="Car" style="width:100%">

<div class="w3-container">
<p>In this example, the sidebar is hidden (style="display:none")</p>
<p>It is shown when you click on the menu icon in the top left corner.</p>
<p>When it is opened, it hides all the page content (style.width="100%").</p>
</div-->

<script language="JavaScript">
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>