@extends('layouts.app')

@section('content')
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Today Volunteering Requests</h4>
                                <h5 class="card-subtitle">Overview of Today Volunteering Requests</h5>
							</div>
                        </div>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-12">
							<ul class="list-style-none feed-body m-0 p-b-20">
							@forelse ( $volunteers_today as $volunteerstoday )	
                                <li class="feed-item">
                                    <div class="font-16"><i class="far fa-bell"></i> {{ $volunteerstoday->First_Name }} {{ $volunteerstoday->Family_Name }} -> <span class="ml-auto font-12 text-muted">{{ $volunteerstoday->Department }}</span></div>
                                </li>
							@empty
							<br>
							<h5 class="card-subtitle text-center">There's no any new volunteers requests</h5>
							@endforelse
                            </ul>
							<hr>
							<div class="d-md-flex align-items-center">
								<div class="ml-auto d-flex no-block align-items-center">
									<ul class="list-inline font-12 dl m-r-15 m-b-0">
										<li class="list-inline-item text-info"><i class="fa fa-circle"></i> Approved
										</li>
										<li class="list-inline-item text-primary"><i class="fa fa-circle"></i> Pending
										</li>
									</ul>
								</div>
							</div>
							<h4>Statistics about volunteers</h4>
							<ul class="list-inline font-12 dl m-r-15 m-b-0">
								<li class="list-inline-item text-info"><i class="fa fa-circle"></i> Utopians volunteers No. 
								<a href="volunteersutopianscounts">{{ $volunteers_utopians_counts }}</a></li><br>
								
								<li class="list-inline-item text-primary"><i class="fa fa-circle"></i> Request volunteers No.
								<a href="volunteersrequestcounts">{{ $volunteers_request_counts }}</a></li>
							</ul>
							</div>
                            <!-- column -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Birthdays</h4>
                        <div class="feed-widget">
                            <ul class="list-style-none feed-body m-0 p-b-20">
							@forelse( $birthday as $birth_day )	
                                <li class="feed-item">
                                    <div class="feed-icon bg-info"><i class="far fa-bell"></i></div> {{ $birth_day->First_Name }} {{ $birth_day->Family_Name }} <span class="ml-auto font-12 text-muted">{{ $birth_day->Date_Of_Birth }}</span>
                                </li>
							@empty
							<br>
							<h5 class="card-subtitle text-center">There's no birthday's today</h5>
							@endforelse
                            </ul>
                        </div>
						<div class="text-center upgrade-btn">
							<a href="birthdayWeek" class="btn btn-danger text-white"
								>Birthdays in 7 days</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Latest Volunteering Requests Accepted</h4>
                                <h5 class="card-subtitle">Overview of Latest Volunteering Requests Accepted</h5>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="table-responsive">
                        <table class="table v-middle text-center">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Date Of Birth</th>
                                    <th class="border-top-0">Specialization</th>
                                    <th class="border-top-0">English_Level</th>
                                    <th class="border-top-0">Department</th>
                                    <th class="border-top-0">Notes</th>
                                    <th class="border-top-0"></th>
                                </tr>
                            </thead>
                            <tbody>
							@foreach ( $voluteers_accept as $voluteersaccept )	
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a
                                                    class="btn btn-circle d-flex btn-info text-white">
													
						{{ $firstStringCharacter = substr( $voluteersaccept->First_Name , 0, 1) }}.{{ $firstStringCharacter = substr( $voluteersaccept->Family_Name , 0, 1) }}
													
													</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">{{ $voluteersaccept->First_Name }} {{ $voluteersaccept->Family_Name }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $voluteersaccept->Date_Of_Birth }}</td>
                                    <td>{{ $voluteersaccept->Specialization }}</td>
                                    <td>{{ $voluteersaccept->English_Level }}</td>
                                    <td>{{ $voluteersaccept->Department }}</td>
                                    <td>{!! $voluteersaccept->Notes !!}</td>
                                    <td>
										<a href="volunteer/{{ $voluteersaccept->id }}/morevolunteer" class="m-b-0 btn btn-danger text-white">more</a>
                                    </td>
                                </tr>
							@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
@endsection
