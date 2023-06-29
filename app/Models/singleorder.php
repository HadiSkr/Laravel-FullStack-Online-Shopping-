<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order;
use App\Models\product;
class singleorder extends Model
{
    use HasFactory;
    protected $primaryKey = 'singleorder_id';
    protected $table = 'singleorders';
    protected $fillable = [
        'singleorder_id',
        'price',
        'qty',
        'orders_id',
        'productid',
      ];
      public function order()
      {
          return $this->belongsTo(order::class);
      }
    public function product(){
        return $this->belongsTo(product::class, 'productid');
    }
}
