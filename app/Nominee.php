<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $fillable = [
        'number_id', 'name'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
