<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'regency_id', 'name'
    ];

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function village()
    {
        return $this->hasMany(Village::class);
    }
}
