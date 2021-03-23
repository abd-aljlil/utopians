@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Summary of UTOPIANS Volunteers Birthdays in Next 7 Days:</h4><br>
                                <div class="feed-widget">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
									@foreach ( $birthweek as $birth_week )	
                                        <li class="feed-item">
                                            <div class="feed-icon bg-info"><i class="far fa-bell"></i></div> {{ $birth_week->First_Name }} {{ $birth_week->Family_Name }} <span class="ml-auto font-12 text-muted">{{ $birth_week->Date_Of_Birth }}</span>
                                        </li>
									@endforeach
                                    </ul>
                                </div>
								<div class="text-center upgrade-btn">
									<a href="home" class="btn btn-success text-white"
										>Back</a>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
