<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Volunteer;
use App\Volunteer_Stat;
use App\User;
use DB;
use Carbon\Carbon;
use Session;

class VolunteersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    
    public function addvolunteer(Request $request) {
		
		$validator = Validator::make($request->all(), [
            'Email' => 'required|unique:volunteers|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'أنت متقدم مسبقاً بطلب تطوع.. سيتم التواصل معك من قبل فريق الموارد البشرية وشكراً');
		}
		
        $volunteer = new volunteer;
		$stat	   = new volunteer_stat;
        
        $volunteer->First_Name          = $request->First_Name;
        $volunteer->Family_Name         = $request->Family_Name;
        $volunteer->Father_Name         = $request->Father_Name;
        $volunteer->Date_Of_Birth       = $request->Date_Of_Birth;
        $volunteer->Current_Country     = $request->Current_Country;
        $volunteer->Current_City        = $request->Current_City;
        $volunteer->Nationality         = $request->Nationality;
        
        $volunteer->Phone_Number        = $request->Phone_Number;
        $volunteer->Email               = $request->Email;
        $volunteer->Facebook_Page       = $request->Facebook_Page;
        
        $volunteer->Degree              = $request->Degree;
        $volunteer->Specialization      = $request->Specialization;
        $volunteer->University          = $request->University;
        $volunteer->English_Level       = $request->English_Level;
        
        $volunteer->Position            = $request->Position;
        $volunteer->Company             = $request->Company;
        $volunteer->Department          = $request->Department;
        $volunteer->Department_Reason	= $request->Department_Reason;
        $volunteer->Voluntary_Reason    = $request->Voluntary_Reason;
        $volunteer->Six_Months          = $request->Six_Months;
        
		$volunteer->save();
		
		$vol_stat = DB::table('volunteers')->where('Email', $request->Email)->get();
		foreach ( $vol_stat as $vo ) {
			$vo_id = $vo->id;
		}
		
		if (Auth::check())
		    {
                $userID = Auth::User()->id ;
            }else{
                $userID = '0';
            }
            
		$stat->volunteer_id         	= $vo_id;
        $stat->accepted         		= '0';
        $stat->stop        				= '0';
		$stat->trash         			= '0';
		$stat->dismiss         			= '0';
		$stat->created_by				= $userID;
        
		
        $stat->save();
	
	
        return redirect('/')->with('message', 'تم إضافة بيانات طلب التطوع بنجاح');
    }
    
    
    public function browsevolunteers(Request $request) {
		
		$details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')->orderBy('volunteers.id', 'DESC')->get();
			
		return view('browse-request.browseVolunteers', compact('details'));
    }
	
	public function browseutopians(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')->orderBy('volunteers.id', 'ASC')->get();
		        
        return view('browse-request.browseUtopians', compact('details'));
    }
    
    public function editvolunteer(Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {
            
            $details = DB::table('volunteers_stat')
            ->where('volunteer_id', $volunteer->id)->get();
            
        return view('edit-request.editVolunteer', compact('volunteer','details'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة التعديل';
        return view('/alerts', compact('error'));	
		}
    }
    
    public function updatevolunteer(Request $request , Volunteer $volunteer) {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {

        $id  = $request->get('id');
        DB::table('volunteers')
            ->where('id', $id)
            ->update([
                'First_Name'            => $request->First_Name,
                'Family_Name'           => $request->Family_Name,
                'Father_Name'           => $request->Father_Name,
                'Date_Of_Birth'         => $request->Date_Of_Birth,
                'Current_Country'       => $request->Current_Country,
                'Current_City'          => $request->Current_City,
                'Nationality'           => $request->Nationality,
                
                'Phone_Number'          => $request->Phone_Number,
                'Email'                 => $request->Email,
                'Facebook_Page'         => $request->Facebook_Page,
                
                'Degree'                => $request->Degree,
                'Specialization'        => $request->Specialization,
                'University'            => $request->University,
                'English_Level'         => $request->English_Level,
                
                'Position'              => $request->Position,
                'Company'               => $request->Company,
                'Department'            => $request->Department,
                'Department_Reason'     => $request->Department_Reason,
                'Voluntary_Reason'      => $request->Voluntary_Reason,
                'Six_Months'            => $request->Six_Months,
                
             ]);
			 
		DB::table('volunteers_stat')
            ->where('volunteer_id', $id)
            ->update([
                'updated_by'            => $request->id,
             ]);
        $error = 'تم تحديث بيانات طلب التطوع بنجاح';
        return view('/alerts', compact('error'));
		
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
    
    public function acceptvolunteer(Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {

		$details = DB::table('volunteers_stat')
            ->where('volunteer_id', $volunteer->id)->get();
			
        return view('edit-request.acceptVolunteer', compact('volunteer', 'details'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
    
    
    public function updateacceptvolunteer(Request $request ,Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {
		$volunteer = DB::table('volunteers_stat')->where('volunteer_id', $volunteer->id)->first();
        $id  = $request->get('id');
        DB::table('volunteers_stat')
            ->where('volunteer_id', $id)
            ->update([
				'Accepted'				=> '1',
				
				'stop'					=> '0',
				
				'dismiss'				=> '0',
			
                'Accepting_Status'      => $request->Accepting_Status,
                
                'Volunteer_History'     => $volunteer->Volunteer_History . '<br>' . Carbon::now() . ' بدأ في  ' . $request->Accepting_Status . '   ' . $request->Volunteer_History ,
                
                'Notes'                 => $volunteer->Notes . '<br>' . Carbon::now() . '   ' . $request->Notes,
                
                'updated_by'            => Auth::User()->id,
                
                'updated_at'            => Carbon::now(),
                 ]);
        
		$error = 'تم تحديث بيانات طلب التطوع بنجاح';
        return view('/alerts', compact('error'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
    
    public function dismissvolunteer(Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {

        return view('edit-request.dismissVolunteer', compact('volunteer'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
	
	public function updatedismissvolunteer(Request $request ,Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {

        $id  = $request->get('id');
		$volunteer = DB::table('volunteers_stat')->where('volunteer_id', $volunteer->id)->first();

        DB::table('volunteers_stat')
            ->where('volunteer_id', $id)
            ->update([
			
				'dismiss'				=> '1',
                
                'Volunteer_History'     => $volunteer->Volunteer_History . '<br>' . Carbon::now() . ' رفض الطلب في  ' . '   ' . $request->Volunteer_History ,
                
                'Notes'                 => $volunteer->Notes . '<br>' . Carbon::now() . '   ' . $request->Notes,
                 ]);
        
        $error = 'تم تحديث بيانات طلب التطوع بنجاح';
        return view('/alerts', compact('error'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
    
    public function deletevolunteer(Request $request ,Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {

        $status = DB::table('volunteers_stat')
            ->where('volunteer_id', $volunteer->id)->get();

        return view('edit-request.deleteVolunteer', compact('volunteer', 'status'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
	
	public function updatedeletevolunteer(Request $request ,Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') ) {

        $id  = $request->get('id');
        DB::table('volunteers')
            ->where('id', $id)
            ->delete();
			
		DB::table('volunteers_stat')
            ->where('volunteer_id', $id)
            ->delete();
        $error = 'تم حذف بيانات المتطوع بنجاح';
        return view('/alerts', compact('error'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
	
	public function stopvolunteer(Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {

		
		$details = DB::table('volunteers_stat')
            ->where('volunteer_id', $volunteer->id)->get();

        return view('edit-request.stopVolunteer', compact('volunteer', 'details'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
    
    
    public function updatestopvolunteer(Request $request ,Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {

        $id  = $request->get('id');
		$volunteer = DB::table('volunteers_stat')->where('volunteer_id', $volunteer->id)->first();

        DB::table('volunteers_stat')
            ->where('volunteer_id', $id)
            ->update([
                'accepted'      		=> '0' ,
				
                'Accepting_Status'      => '0' ,
				
				'stop'				    => '1' ,
                
                'Volunteer_History'     => $volunteer->Volunteer_History . '<br>' . Carbon::now() . ' فصل من  ' . $request->Accepting_Status . '   ' . $request->Volunteer_History,
                
                'Notes'                 => $volunteer->Notes . '<br>' . Carbon::now() . '   ' . $request->Notes,
                
                'updated_at'            => Carbon::now(),
                 ]);
        
        $error = 'تم انهاء فترة التطوع بنجاح';
        return view('/alerts', compact('error'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
	
	public function trashvolunteer(Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {

		$status = DB::table('volunteers_stat')
            ->where('volunteer_id', $volunteer->id)->get();

        return view('edit-request.trashVolunteer', compact('volunteer', 'status'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
    
    
    public function updatetrashvolunteer(Request $request ,Volunteer $volunteer)
    {
		if ( Auth::user()->hasRole('IT') || Auth::user()->hasRole('HR') || Auth::user()->hasRole('SysAdministrator') ) {

        $id  = $request->get('id');
		$volunteer = DB::table('volunteers_stat')->where('volunteer_id', $volunteer->id)->first();

        DB::table('volunteers_stat')
            ->where('volunteer_id', $id)
            ->update([
                'accepted'      		=> '0' ,
				
                'Accepting_Status'      => '0' ,
				
				'trash'				    => '1' ,
                
                'Volunteer_History'     => $volunteer->Volunteer_History . '<br>' . Carbon::now() . ' فصل من  ' . $request->Accepting_Status . '   ' . $request->Volunteer_History,
                
                'Notes'                 => $volunteer->Notes . '<br>' . Carbon::now() . '   ' . $request->Notes,
                 ]);
        
        $error = 'تم حذف المتطوع بنجاح';
        return view('/alerts', compact('error'));
		} else {
			$error = 'ليس لديك الصلاحية للوصول لصفحة تحديث البيانات';
        return view('/alerts', compact('error'));	
		}
    }
    
    
    public function volunteersutopianscounts()
    {
        $volunteers_teachers_utopians_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers_stat.Accepting_Status', 'قسم المدرسين')->orwhere('volunteers_stat.Accepting_Status', 'Teachers Dept.')->count();	
        
        $volunteers_curriculum_utopians_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers_stat.Accepting_Status', 'قسم تطوير المناهج')->orwhere('volunteers_stat.Accepting_Status', 'Curriculum Development Dept.')->count();
		        
        $volunteers_coordinating_utopians_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers_stat.Accepting_Status', 'قسم التنسيق')->orwhere('volunteers_stat.Accepting_Status', 'Coordinating Dept.')->count();
		        
        $volunteers_student_utopians_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('Accepting_Status', 'قسم شؤون الطلاب')->orwhere('Accepting_Status', 'Student Affairs Dept.')->count();
		        
        $volunteers_design_utopians_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers_stat.Accepting_Status', 'قسم التصميم')->orwhere('volunteers_stat.Accepting_Status', 'Design Dept.')->count();
		        
        $volunteers_technical_utopians_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers_stat.Accepting_Status', 'قسم تكنولوجيا المعلومات')->orwhere('volunteers_stat.Accepting_Status', 'Technical Information Dept.')->count();
		        
        $volunteers_marketing_utopians_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers_stat.Accepting_Status', 'قسم التسويق والعلاقات العامة')->orwhere('volunteers_stat.Accepting_Status', 'Marketing & Public Relation Dept.')->count();
		        
        $volunteers_hr_utopians_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers_stat.Accepting_Status', 'قسم الموارد البشرية')->orwhere('volunteers_stat.Accepting_Status', 'HR Dept.')->count();
			
        
        return view('/edit-request.volunteersUtopiansCounts',compact('volunteers_teachers_utopians_counts', 'volunteers_curriculum_utopians_counts','volunteers_coordinating_utopians_counts', 'volunteers_student_utopians_counts','volunteers_design_utopians_counts', 'volunteers_technical_utopians_counts','volunteers_marketing_utopians_counts', 'volunteers_hr_utopians_counts' ));
    }
    
    
    public function volunteersrequestcounts()
    {
        $volunteers_teachers_request_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers.Department', 'قسم المدرسين')->orwhere('volunteers.Department', 'Teachers Dept.')->count();
		        
        $volunteers_curriculum_request_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers.Department', 'قسم تطوير المناهج')->orwhere('volunteers.Department', 'Curriculum Development Dept.')->count();
		        
        $volunteers_coordinating_request_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers.Department', 'قسم التنسيق')->orwhere('volunteers.Department', 'Coordinating Dept.')->count();
		        
        $volunteers_student_request_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers.Department', 'قسم شؤون الطلاب')->orwhere('volunteers.Department', 'Student Affairs Dept.')->count();
		        
        $volunteers_design_request_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers.Department', 'قسم التصميم')->orwhere('volunteers.Department', 'Design Dept.')->count();
		        
        $volunteers_technical_request_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers.Department', 'قسم تكنولوجيا المعلومات')->orwhere('volunteers.Department', 'Technical Information Dept.')->count();
		        
        $volunteers_marketing_request_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers.Department', 'قسم التسويق والعلاقات العامة')->orwhere('volunteers.Department', 'Marketing & Public Relation Dept.')->count();
		        
        $volunteers_hr_request_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('volunteers.Department', 'قسم الموارد البشرية')->orwhere('volunteers.Department', 'HR Dept.')->count();
        
        
        return view('/edit-request.volunteersRequestCounts',compact('volunteers_teachers_request_counts', 'volunteers_curriculum_request_counts','volunteers_coordinating_request_counts', 'volunteers_student_request_counts','volunteers_design_request_counts', 'volunteers_technical_request_counts','volunteers_marketing_request_counts', 'volunteers_hr_request_counts' ));
    }
    
    
    public function browseteachersrequest(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('Department', 'قسم المدرسين')->orwhere('Department', 'Teachers Dept.')
            ->orderBy('volunteers.id', 'DESC')->get();
        
        return view('browse-request.browseVolunteers', compact('details'));
    }
    
    public function browsecurriculumrequest(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('Department', 'قسم تطوير المناهج')->orwhere('Department', 'Curriculum Development Dept.')
            ->orderBy('volunteers.id', 'DESC')->get();
        
        return view('browse-request.browseVolunteers', compact('details'));
    }
    
    public function browsecoordinatingrequest(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('Department', 'قسم التنسيق')->orwhere('Department', 'Coordinating Dept.')
            ->orderBy('volunteers.id', 'DESC')->get();
        
        return view('browse-request.browseVolunteers', compact('details'));
    }
    
    public function browsestudentrequest(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('Department', 'قسم شؤون الطلاب')->orwhere('Department', 'Student Affairs Dept.')
            ->orderBy('volunteers.id', 'DESC')->get();
        
        return view('browse-request.browseVolunteers', compact('details'));
    }
    
    public function browsedesignrequest(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('Department', 'قسم التصميم')->orwhere('Department', 'Design Dept.')
            ->orderBy('volunteers.id', 'DESC')->get();
        
        return view('browse-request.browseVolunteers', compact('details'));
    }
    
    public function browsetechnicalrequest(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('Department', 'قسم تكنولوجيا المعلومات')->orwhere('Department', 'Technical Information Dept.')
            ->orderBy('volunteers.id', 'DESC')->get();
        
        return view('browse-request.browseVolunteers', compact('details'));
    }
    
    public function browsemarketingrequest(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('Department', 'قسم التسويق والعلاقات العامة')->orwhere('Department', 'Marketing & Public Relation Dept.')
            ->orderBy('volunteers.id', 'DESC')->get();
			
        return view('browse-request.browseVolunteers', compact('details'));
    }
    
    public function browsehrrequest(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')
			->where('volunteers_stat.dismiss', '0')->where('volunteers_stat.stop', '0')
			->where('Department', 'قسم الموارد البشرية')->orwhere('Department', 'HR Dept.')
            ->orderBy('volunteers.id', 'DESC')->get();
        
        return view('browse-request.browseVolunteers', compact('details'));
    }
    
	public function browsestopvolunteer(Request $request) {
        
        $details = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
            ->where('volunteers_stat.stop', '1')->where('volunteers_stat.dismiss', '0')->get();
		        
        return view('browse-request.stopedVolunteers', compact('details'));
    }
    
    public function morevolunteer(Volunteer $volunteer)
    {
	
        $details = DB::table('volunteers_stat')->where('volunteer_id', $volunteer->id)->first();
        $file_pic   = DB::table('files')->where('volunteer_id', $volunteer->id)->where('file_type', 'pic')->get();
        $file_doc   = DB::table('files')->where('volunteer_id', $volunteer->id)->where('file_type', 'doc')->get();

        return view('edit-request.moreVolunteer', compact('volunteer', 'details', 'file_pic', 'file_doc'));
        
    }
    
	public function birthday()
	{
		
		$birthweek = DB::table('volunteers')->where(WEEK(`Date_Of_Birth`, 0), '=', 'WEEK(NOW(), 0)')->get();
		
		return view('home', compact('birthweek'));
	}
    
    
    
}

