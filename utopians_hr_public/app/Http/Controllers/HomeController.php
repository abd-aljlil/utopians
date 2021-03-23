<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Volunteer;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		// 1- Birthday
		
		$date = now();
		
		$birthday = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.stop', '0')
            ->Where(function ($query) use ($date) {
               $query->whereMonth('volunteers.Date_Of_Birth', '=', $date->month)
                   ->whereDay('volunteers.Date_Of_Birth', '=', $date->day);
           })->take(5)->get();

		//  2- Volunteers Today
		
		$volunteers_today = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.stop', '0')->where('volunteers_stat.stop', '0')->whereMonth('volunteers_stat.created_at', '=', $date->month)
            ->Where(function ($query) use ($date) {
               $query->whereMonth('volunteers_stat.created_at', '=', $date->month)
                   ->whereDay('volunteers_stat.created_at', '=', $date->day);
           })->take(10)->get();
		   
		// 3- Counts Request
			
        $volunteers_request_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '0')->where('volunteers_stat.trash', '0')->where('volunteers_stat.stop', '0')->count();
        
		// 4- Counts Utopians
		
        $volunteers_utopians_counts = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')->where('volunteers_stat.stop', '0')->count();

		// 5- Utopians Accepting_Status
		        
        $voluteers_accept = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.trash', '0')->where('volunteers_stat.stop', '0')->take(5)->get();
        
		// 6- Error 503 Service Temporarily Unavailable
		
    //  return view('pages.503', compact('birthday', 'volunteers_request_counts', 'volunteers_utopians_counts', 'volunteers_today', 'voluteers_accept'));

      return view('home', compact('birthday', 'volunteers_request_counts', 'volunteers_utopians_counts', 'volunteers_today', 'voluteers_accept'));
    }
	
	public function birthdayWeek()
    {
		$date = now();
		
        $birthweek = DB::table('volunteers')
			->join('volunteers_stat', 'volunteers.id', 'volunteers_stat.volunteer_id')
			->where('volunteers_stat.accepted', '1')->where('volunteers_stat.stop', '0')
            ->Where(function ($query) use ($date) {
               $query->whereMonth('volunteers.Date_Of_Birth', '=', $date->month)
                   ->whereDay('volunteers.Date_Of_Birth', '>=', $date->day);
           })->orderBy('volunteers.Date_Of_Birth','ASC')->take(100)->get();
        
        return view('pages.birthdayWeek', compact('birthweek'));
    }
    
}
