@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('HR Management System') }}</div>

                <div class="card-body">
					<!-- error -->
					<div class="alert alert-info text-center">
						<h4>{{ $error }}</h4>
					</div>
					<!-- error -->
					<br><br><br>
					
					<div class="text-center upgrade-btn">
						<a href="/browsevolunteers " class="btn btn-info text-white"
							>Back to Volunteers Request</a>
					</div>
					<br>
					<div class="text-center upgrade-btn">
						<a href="/browseutopians " class="btn btn-success text-white"
							>Back to Utopians Volunteers</a>
					</div>
					<br>
					<div class="text-center upgrade-btn">
						<a href="/volunteersrequestcounts " class="btn btn-warning text-white"
					>Statistics Volunteers Requests</a>
					</div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
