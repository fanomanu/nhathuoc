@if (count($errors) > 0)
    <div class="col-lg-12 alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                   {!! $error !!} 
                </li>
            @endforeach
        </ul>
    </div>
@endif


@if(Session::has('flash-message'))
	<div class="col-lg-12">
		@if(Session::get('flash-type') == 'inform')
	        <div class="alert  {!! Session::get('flash-style') !!} flash-inform">
	            {!! Session::get('flash-message') !!}
	        </div>
	        <script type="text/javascript">
    			$("div.flash-inform").delay(3000).slideUp();    
	        </script>
        @elseif(Session::get('flash-type') == 'confirm')
			<div class="alert {!! Session::get('flash-style') !!} flash-confirm">
	            {!! Session::get('flash-message') !!} <button type="button" id="button_close_confirm" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        </div>
	        <script type="text/javascript">
    			$("#button_close_confirm").click(function(event) {
    				$("div.flash-confirm").slideUp();    
    			});  
	        </script>
        @endif
    </div><!-- flash-message -->
@endif
            