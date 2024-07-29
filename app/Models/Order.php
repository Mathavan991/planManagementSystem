<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'address',
        'city',
        'postal_code',
        'phone_number',
        'plan_end_date',
        'total_amount',
        'transactionid',
        'userid',
        'plantype_id',
    ];
}
