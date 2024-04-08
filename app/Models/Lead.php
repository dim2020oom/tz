<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'partner_id',
        'product_id',
        'product_price',
        // Другие поля лида, которые вы хотите разрешить массово заполнять
    ];
}
