<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
class store  extends  Authenticatable
{
  
  use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'stores';
    protected $primaryKey = 'store_id';
    protected $fillable = [
        'store_id',
        'name',
        'description',
        'features',
          'eval',
        'image',
        'email',
        'password',
        'location_id'
      ];
    
      public function products()
      {
          return $this->hasMany(product::class);
      }
      /*public function departments()
      {
          return $this->hasMany(department::class);
      }*/
      public function location(){
        return $this->belongsTo(location::class);
    }
}
