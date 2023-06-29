<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class customer extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'customerid';
    protected $fillable = [
      'customerid',
      'role_as',
      'firstname',
      'lastname',
      'phone',
      'image',
	    'password',
      'email',
      'gender',
      'birthdate',
      'location_id',
	];
    public function location(){
        return $this->belongsTo(location::class);
    }
    
    public function carts()
      {
          return $this->hasMany(cart::class);
      }
      public function orders()
      {
          return $this->hasMany(order::class);
      }
}
