<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function settings()
    {
        return $this->hasMany(CompanySetting::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
