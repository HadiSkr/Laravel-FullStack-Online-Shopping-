<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Auth;
use App\Models\product;
class department extends Model
{
  use HasApiTokens, HasFactory;
      protected $table = 'departments';
    protected $primaryKey = 'department_id';
    protected $fillable = [
        'department_id',
        'description',
        'name',
        'type',
        'img',
        'keywords',
        'status',
        'popular',
       // 'store_id'
      ];
      /*public function product()
      {
          return $this->hasMany(product::class);
      }*/
    
}
