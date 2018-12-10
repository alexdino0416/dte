<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'name', 'lastname', 'age', 'gender', 'email', 'job', 'city', 'calification', 'opinion'
    ];

    public function city()
    {
        return $this->belongsTo(City::Class);
    }
    public function job()
    {
        return $this->belongsTo(Job::Class);
    }
}
