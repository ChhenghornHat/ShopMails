<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function stock()
    {
        return $this->belongsTo(MailStock::class, 'stock_id');
    }
}
