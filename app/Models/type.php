<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $primaryKey = 'types_id';
     protected $fillable = [
       'types_id',
       'detailes',
       'name'
     ];
}
