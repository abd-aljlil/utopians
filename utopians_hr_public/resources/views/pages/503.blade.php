@extends('layouts.app2')

@section('content')

<script src="{{asset('js/main.js')}}"></script>
	
<div class="container">
    <div class="row justify-content-center">
		<div style="text-align:center;padding:0px 10px 20px 10px;">
			<img src="{{asset('logo.png')}}" style="width:15%;">
		</div>
        <div class="col-md-12">
			<div class="text-center error503"><h4 id="demo"></h4></div>
			<br>
			<h3 class="text-center error503">Error 503 - Service Temporarily Unavailable</h3>
			<br>
			<h4 class="text-center">Our website is currently undergoing scheduled maintenance.
			<br>We Should be back shortly. Thank you for your patience.</4>
			<br>
			<br>
            <h6 class="rights login100-form-title p-b-43">You Can contact with IT Support on <a href="https://www.facebook.com/abduljalil.abo.ali/">Facebook</a>
			, <span class="contact-important">"just for the importance"</span></h6>
		</div>
		<div class="rights login100-form-title p-b-43"> <p>All rights reserved <a href="https://www.utopians-edu.org/" target="_blank">Utopians</a>  <span class="reg">&reg;</span></p> </div>
    </div>
</div>

@endsection
