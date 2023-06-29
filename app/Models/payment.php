<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment
{
    use HasFactory;
    protected $primaryKey = 'payments_id';
    protected $table = 'payments';

    protected $fillable = [
        'payments_id',
        'total',
        'type'
          ];
}
