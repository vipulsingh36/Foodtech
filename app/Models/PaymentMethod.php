<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'paymentmethod';

    protected $fillable = [
        'payment_name',
        'key_id',
        'secret_id',
        'payment_mode',
        'payment_img',
        'payment_status'
    ];
}
