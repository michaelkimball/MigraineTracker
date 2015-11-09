<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';
    
    protected $fillable = [];
    
    protected $hidden = [];
    
    protected $guarded = [];

    public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
