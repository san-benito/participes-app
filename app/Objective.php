<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Objective extends Model
{
    use SoftDeletes;

    protected $table = 'objectives';
    public $incrementing = true; // if IDs are auto-incrementing.
    public $timestamps = true; // if the model should be timestamped.


    protected $casts = [
        'tags' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function organizations()
    {
        return $this->belongsToMany('App\Organization','objective_organization','objective_id','organization_id');
    }

    public function goals()
    {
        return $this->hasMany('App\Goal','objective_id');
    }

    public function cover()
    {
        return $this->morphOne('App\ImageFile', 'imageable');
    }

    public function files()
    {
        return $this->morphMany('App\Files','fileable');
    }
    
    public function events()
    {
        return $this->belongsToMany('App\Event','event_objective','objective_id','event_id');
    }

    public function members()
    {
        return $this->belongsToMany('App\User','objective_user','objective_id','user_id')->withPivot('role')->withTimestamps();
    }

    public function subscribers()
    {
        return $this->belongsToMany('App\User','objective_subscriber','objective_id','subscriber_id')->withTimestamps();
    }
}