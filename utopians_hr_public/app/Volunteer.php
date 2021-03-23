<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'volunteers';
	protected $fillable = [
        'First_Name', 'Family_Name','Father_Name','	Date_Of_Birth','Current_Country','Current_City',
		'Nationality', 'Phone_Number','Email','Facebook_Page','Degree','Specialization',
		'University', 'English_Level','Position','Company','Department','Department_Reason','Voluntary_Reason','Six_Months'
    ];
	
	public function Volunteer_Stat()
    {
      return $this->hasMany(Volunteer_Stat::class , 'exam_name_index_questions_id' , 'Volunteer_id');
    }
}
