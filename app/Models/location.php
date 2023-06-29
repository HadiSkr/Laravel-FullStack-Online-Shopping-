<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $primaryKey = 'location_id';
    protected $fillable = [
        'location_id',
        'country',
        'city',
        'street',
      ];
     
      public function customer()
      {
          return $this->hasMany(customer::class);
      }
     
      public function stores()
      {
          return $this->hasMany(store::class);
      }
}
