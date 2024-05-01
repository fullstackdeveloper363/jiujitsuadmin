<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImageAttribute($value)
    {
        if(!empty($value))
        {
            if (request()->segment(1) == 'api') {
                return asset('storage/'.$value);
            } else {
                return $value;
            }
        }
        else
        {
            return $value;
        }
    }

}
