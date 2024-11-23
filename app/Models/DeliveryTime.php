<?php

// app/Models/DeliveryTime.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    use HasFactory;

    protected $fillable = ['delivery_id', 'start_time', 'end_time'];

    // リレーション（Deliveryモデルとの関連）
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
