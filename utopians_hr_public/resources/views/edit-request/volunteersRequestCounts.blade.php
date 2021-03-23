@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('HR Management System') }}</div>

                <div class="card-body">
                    
                    <h4 style="text-align:center; font-weight: bold;" >Statistics about UTOPIANS Volunteers Requests</h4><br><br>
                    
                    <h5>Volunteers of Teachers Dept. No. <span class="volunteers_counts"><a href="browseteachersrequest">{{ $volunteers_teachers_request_counts }}</a></span></h5><br>
                    
                    <h5>Volunteers of Curriculum Development Dept. No. <span class="volunteers_counts"><a href="browsecurriculumrequest">{{ $volunteers_curriculum_request_counts }}</a></span></h5><br>
                    
                    <h5>Volunteers of Coordinating Dept. No. <span class="volunteers_counts"><a href="browsecoordinatingrequest">{{ $volunteers_coordinating_request_counts }}</a></span></h5><br>
                    
                    <h5>Volunteers of Student Affairs Dept. No. <span class="volunteers_counts"><a href="browsestudentrequest">{{ $volunteers_student_request_counts }}</a></span></h5><br>
                    
                    <h5>Volunteers of Design Dept. No. <span class="volunteers_counts"><a href="browsedesignrequest">{{ $volunteers_design_request_counts }}</a></span></h5><br>
                    
                    <h5>Volunteers of Technical Information Dept. No. <span class="volunteers_counts"><a href="browsetechnicalrequest">{{ $volunteers_technical_request_counts }}</a></span></h5><br>
                    
                    <h5>Volunteers of Marketing & Public Relation Dept. No. <span class="volunteers_counts"><a href="browsemarketingrequest">{{ $volunteers_marketing_request_counts }}</a></span></h5><br>
                    
                    <h5>Volunteers of HR Dept. No. <span class="volunteers_counts"><a href="browsehrrequest">{{ $volunteers_hr_request_counts }}</a></span></h5><br>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
