<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'journals';
   
    protected $fillable = 
    [
        'name',
        'description',
        'severity',
        'location_city',
        'location_state',
        'location_zip',
        'location_country',
        'sound_level',
        'light_level',
        'still_suffering',
        'start_time',
        'end_time',
        'weather_pressure',
        'weather_temperature',
        'has_aura',
        'aura_description',
        'has_nausea',
        'has_vomited',
        'has_light_sensitivity',
        'has_sound_sensitivity',
        'has_disrupted',
        'missed_workschool',
        'missed_routines',
        'missed_social',
        'missed_personal_activity',
    ];
    //protected $dates = ['start_time', 'end_time'];
    protected $guarded = [];
    
    protected $hidden = [];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function medicines()
    {
        return $this->belongsToMany('App\Medicine');
    }

    public function triggers()
    {
        return $this->belongsToMany('App\Trigger');
    }
    
    public function common_triggers()
    {
        return $this->belongsToMany('App\CommonTriggers');
    }
    
    public function notes()
    {
        return $this->belongsToMany('App\Note');
    }

    public function pain_locations()
    {
        return $this->belongsToMany('App\PainLocations');
    }
}
