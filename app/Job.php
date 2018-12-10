<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'name'
    ];

    public function people()
    {
        return $this->hasMany(People::Class);
    }
}
