<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeltRank extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImageAttribute($value)
    {
        if (request()->segment(1) == 'api') {
            if(!empty($value))
            {
                return asset($value);
            }
            else
            {
                return $value;
            }
        } else {
            return $value;
        }
    }
}
