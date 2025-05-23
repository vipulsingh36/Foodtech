<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attrvalue extends Model
{
    use HasFactory;

    protected $table = 'attrvalues';

    protected $fillable = [
        'attribute',
        'value'
    ];
}
