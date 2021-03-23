@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('HR Management System') }}</div>

                <div class="card-body">
                    
                    <h4 style="text-align:center; font-weight: bold;" >Statistics about UTOPIANS volunteers</h4><br><br>
                    
                    <h5>Volunteers of Teachers Dept. No. <span class="volunteers_counts">{{ $volunteers_teachers_utopians_counts }}</span></h5><br>
                    
                    <h5>Volunteers of Curriculum Development Dept. No. <span class="volunteers_counts">{{ $volunteers_curriculum_utopians_counts }}</span></h5><br>
                    
                    <h5>Volunteers of Coordinating Dept. No. <span class="volunteers_counts">{{ $volunteers_coordinating_utopians_counts }}</span></h5><br>
                    
                    <h5>Volunteers of Student Affairs Dept. No. <span class="volunteers_counts">{{ $volunteers_student_utopians_counts }}</span></h5><br>
                    
                    <h5>Volunteers of Design Dept. No. <span class="volunteers_counts">{{ $volunteers_design_utopians_counts }}</span></h5><br>
                    
                    <h5>Volunteers of Technical Information Dept. No. <span class="volunteers_counts">{{ $volunteers_technical_utopians_counts }}</span></h5><br>
                    
                    <h5>Volunteers of Marketing & Public Relation Dept. No. <span class="volunteers_counts">{{ $volunteers_marketing_utopians_counts }}</span></h5><br>
                    
                    <h5>Volunteers of HR Dept. No. <span class="volunteers_counts">{{ $volunteers_hr_utopians_counts }}</span></h5><br>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
