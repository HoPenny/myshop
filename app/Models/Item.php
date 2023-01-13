<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function Orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function getFirstPic()
    {
        $pics = json_decode($this->pics, true);
        if (is_array($pics) && count($pics) > 0) {
            return $pics[0];
        } else {
            return null;
        }

    }
    // public function getPicsAttribute()
    // {
    //     $data = json_decode($this->pics, true);
    // }
    public function getPicsArrayAttribute()
    {
        $data = json_decode($this->pics, true);
        return $data;

    }
    public function getTaxPriceAttribute()
    {
        return $this->price_new * 1.05;
    }
}