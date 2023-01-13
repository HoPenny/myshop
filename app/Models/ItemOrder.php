<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemOrder extends Pivot
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['order_id', 'item_id', 'qty', 'option'];
}