@extends('layouts.app')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success" style="text-align:right;">
        {{ session()->get('message') }}
    </div>
@endif

<div>
    <input type="text" id="myInput" onkeyup="myFilterFunction()" placeholder="Filter a Department name e.g= 'قسم تكنولوجيا المعلومات' " title="Type in a Department" style="width: 100%; font-size: 14px; padding: 8px 14px 8px 25px; border: 1px solid #ddd; margin-bottom: 10px;">
</div>

<div style="margin-right: auto; margin-left: auto; text-align: center; direction:rtl;">

<table id="myTable" class="table table-hover table-responsive">
    <thead>
        <tr>
            <th class="hidden">ID</th>
            <th style="width:15%">Name</th>
            <th style="width:10%">Email</th>
            <th style="width:10%">English_L</th>
            <th style="width:20%">University</th>
            <th style="width:20%">Department</th>
            <th style="width:15%">Date of Accept</th>
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
                <td>{{ $detail->Accepting_Status }}</td>
                <td>{{ $detail->updated_at }}</td>
				@if(Auth::user()->hasRole('IT'))
                <td>
                    <span class="label info"><a href="volunteer/{{ $detail->volunteer_id }}/editvolunteer" title="Edit">Edit</a></span>
                    <span class="label warning"><a href="volunteer/{{ $detail->volunteer_id }}/stopvolunteer" title="Stop">Stop</a></span>
					<span class="label danger "><a href="volunteer/{{ $detail->volunteer_id }}/trashvolunteer" title="Trash">Trash</a></span>
					<span class="label other"><a href="volunteer/{{ $detail->volunteer_id }}/morevolunteer" title="More">More</a></span>
                </td>
				@elseif(Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator'))
				<td>
                    <span class="label info"><a href="volunteer/{{ $detail->volunteer_id }}/editvolunteer" title="Edit">Edit</a></span>
                    <span class="label warning"><a href="volunteer/{{ $detail->volunteer_id }}/stopvolunteer" title="Stop">Stop</a></span>
					<span class="label danger "><a href="volunteer/{{ $detail->volunteer_id }}/trashvolunteer" title="Trash">Trash</a></span>
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

<script>
function myFilterFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
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

@endsection
