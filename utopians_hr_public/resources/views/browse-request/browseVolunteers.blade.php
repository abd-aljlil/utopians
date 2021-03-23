@extends('layouts.app')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success" style="text-align:right;">
        {{ session()->get('message') }}
    </div>
@endif

<div style="margin-right: auto; margin-left: auto; text-align: center; direction:rtl;">

<table class="table table-hover table-responsive">
    <thead>
        <tr>
            <th class="hidden">ID</th>
            <th style="width:15%">Name</th>
            <th style="width:10%">Email</th>
            <th style="width:10%">English_L</th>
            <th style="width:20%">University</th>
            <th style="width:20%">Department</th>
            <th style="width:15%">Date of Request</th>
            <th style="width:10%">Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($details as $detail)
            <tr>
                <td class="hidden">{{ $detail->id }} </td>
				<td>{{ $detail->First_Name }} {{ $detail->Family_Name }}</td>
                <td>{{ $detail->Email }}</td>
                <td>{{ $detail->English_Level }}</td>
                <td>{{ $detail->Specialization }} - {{ $detail->University }}</td>
                <td>{{ $detail->Department }}</td>
                <td>{{ $detail->created_at }}</td>
				@if(Auth::user()->hasRole('IT'))
                <td>
                    <span class="label success"><a href="volunteer/{{ $detail->volunteer_id }}/acceptvolunteer" title="Accept">Accept</a></span>
                    <span class="label info"><a href="volunteer/{{ $detail->volunteer_id }}/editvolunteer" title="Edit">Edit</a></span>
                    <span class="label warning"><a href="volunteer/{{ $detail->volunteer_id }}/dismissvolunteer" title="Dismiss">Dismiss</a></span>
					<span class="label danger "><a href="volunteer/{{ $detail->volunteer_id }}/deletevolunteer" title="Delete">Delete</a></span>
					<span class="label other"><a href="volunteer/{{ $detail->volunteer_id }}/morevolunteer" title="More">More</a></span>
                </td>
				@elseif(Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator'))
				<td>
                    <span class="label success"><a href="volunteer/{{ $detail->volunteer_id }}/acceptvolunteer" title="Accept">Accept</a></span>
                    <span class="label info"><a href="volunteer/{{ $detail->volunteer_id }}/editvolunteer" title="Edit">Edit</a></span>
                    <span class="label warning"><a href="volunteer/{{ $detail->volunteer_id }}/dismissvolunteer" title="Dismiss">Dismiss</a></span>
					<span class="label other"><a href="volunteer/{{ $detail->volunteer_id }}/morevolunteer" title="More">More</a></span>
                </td>
				@elseif(Auth::user()->hasRole('Show'))
				<td>
                    <span class="label other"><a href="volunteer/{{ $detail->volunteer_id }}/morevolunteer" title="More">More</a></span>
                </td>
				@endif
            </tr>
        @endforeach
        
    </tbody>
</table>
    
</div>

@endsection
