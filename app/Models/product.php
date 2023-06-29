<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Auth;
use App\Models\department;
class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'productid';
    protected $fillable = [
      'Specification',
      'productid',
      'disc',
      'original_price',
      'selling_price',
      'quantity',
      'keys',
      'status',
      'trending',
      'name',
      'department_id',
	  'image',
      'store_id',
    
	];
    public function departments(){
        return $this->belongsTo(department::class,'department_id');
    }
    
   
   /* public function store(){
        return $this->belongsTo(store::class);
    }
    public function singleorders()
    {
        return $this->hasMany(singleorder::class);
    }
    public function carts()
      {
          return $this->hasMany(cart::class);
      }*/
}
