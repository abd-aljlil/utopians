<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer_Stat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'volunteers_stat';
    protected $fillable = [
        'volunteer_id', 'accepted', 'stop','trash','block','Volunteer_History','Notes'
    ];
	
	
	
}
