<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    public const BILLING_TYPE = 'billing';
    public const SHIPPING_TYPE = 'shipping';

    protected $guarded = ['id'];
}
