<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\singleorder;
use Auth;

class order extends Model
{
    use HasFactory;
    protected $primaryKey = 'orders_id';
    protected $table = 'orders';
    protected $fillable = [
        'orders_id',
        'FirstName',
        'LastName',
        'country',
        'city',
        'address1',
        'address2',
        'phone',
        'status',
        'email',
        'total',
        'tracking_no',
        'user_id'

         ];
         /*
          public function customer(){
            return $this->belongsTo(customer::class);
        }*/
        public function singleorders()
    {
        return $this->hasMany(singleorder::class,'orders_id');
    }
}
