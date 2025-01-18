<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    //
    protected $fillable = ['tracking_number',
    'sender_name',
    'sender_contact',
    'sender_email',
    'sender_address',
    'current_location_date',
    'status',
    'dispatch_location',
    'receiver_email',
    'receiver_name',
    'receiver_contact',
    'receiver_address',
    'dispatch_date',
    'delivery_date',
    'product_name',
    'product_image',
    'percentage_on_delivery',
    'current_location',
    'date'];
}
