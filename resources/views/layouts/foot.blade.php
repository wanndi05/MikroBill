{{-- Plugins --}}
<!--script src="{{ mix('js/app.js') }}"></script-->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery-ui-1.9.2.custom.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery-ui.js') }}"></script>
<script src="{{ asset('plugins/jQuery/countMe/countMe.min.js') }}"></script>
<!--script src="{{ asset('plugins/jQuery/jquery-ui-1.13.2.custom/jquery.min.js') }}"></script-->
<!--script src="{{ asset('plugins/jQuery/jquery-ui-1.13.2.custom/jquery.ui.js') }}"></script>
<script src="{{ asset('plugins/notify/notify.js') }}"></script>
<script src="{{ asset('plugins/notify/styles/metro/notify-metro.js') }}"></script>
<script src="https://unpkg.com/react/umd/react.production.min.js" crossorigin></script>

<script src="https://unpkg.com/react/umd/react.production.min.js" crossorigin></script>

<script
  src="https://unpkg.com/react-dom/umd/react-dom.production.min.js"
  crossorigin></script>

<script
  src="https://unpkg.com/react-bootstrap@next/dist/react-bootstrap.min.js"
  crossorigin></script>

<script>var Alert = ReactBootstrap.Alert;</script-->
{{-- Scripts --}}
<script type="text/javascript">
    $(function () {
        $(".mikrotik_date").datepicker({
            //showOn: 'button',
            //buttonImageOnly: true,
            //buttonImage: '{{ asset('plugins/jQuery/datepicker/calendar.gif') }}',
            dateFormat: 'yy/mm/dd'
        });
    });

    $('.uppercase').keyup(function() {
      this.value = this.value.toUpperCase();
        });

    window.onload = ()=>{
        // $(selector).countMe(delay,speed)
        $(".countMe").countMe(0,1);
     }

		// CSRF Token
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		
		$(document).ready(function(){

			$( ".getRumah" ).autocomplete({
				source: function( request, response ) {
				// Fetch data
				$.ajax({
					url:"{{route('getRumah')}}",
					type: 'post',
					dataType: "json",
					data: {_token: CSRF_TOKEN, search: request.term},
					success: function( data ) {response( data );}
				});
				},
				select: function (event, ui) {
				// Set selection
				$('.getRumah').val(ui.item.label); // display the selected text
				$('.putRumah').val(ui.item.value); // save selected id to input
				return false;
				}
			});

		});

		$(document).ready(function(){

$( ".getPaket" ).autocomplete({
  source: function( request, response ) {
  // Fetch data
  $.ajax({
    url:"{{route('getPaket')}}",
    type: 'post',
    dataType: "json",
    data: {_token: CSRF_TOKEN, search: request.term},
    success: function( data ) {response( data );}
  });
  },
  select: function (event, ui) {
  // Set selection
  $('.getPaket').val(ui.item.label); // display the selected text
  $('.putPaket').val(ui.item.value); // save selected id to input
  return false;
  }
});

});

</script>