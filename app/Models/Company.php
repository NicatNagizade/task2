<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function country()
    {
        return $this->hasOne(Country::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('connected_date');
    }
}
