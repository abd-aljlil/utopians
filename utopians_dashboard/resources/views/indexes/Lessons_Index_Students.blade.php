@extends('layouts.app')
@section('style')
<link href="{{ asset('css/dashboard/CP.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@include('tables.Lessons_Index_Students')
@endsection
@section('script')
<script src="{{ URL::asset('js/vue-good-table.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/dashboard/Lessons_Index_StudentsVue.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/dashboard/Lessons_IndexVue.js') }}" type="text/javascript"></script>
@endsection



