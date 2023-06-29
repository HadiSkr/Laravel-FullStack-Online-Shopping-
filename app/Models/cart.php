<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $primaryKey = 'cart_Id';
    protected $fillable = [
        'cart_Id',
        'quantity',
        'user_id',
        'productid'
      ];
      public function User(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(product::class,'productid');
    }

    }

