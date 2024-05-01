<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected  $casts = [
        'icon' => 'array'
    ];

    public function getIconAttribute($value)
    {
        if (request()->segment(1) === 'api') {
            $decodedValue = json_decode($value);
            if (is_array($decodedValue)) {
                foreach ($decodedValue as $item) {
                    if (isset($item->icon_image)) {
                        $fullIconPath = asset($item->icon_image);
                        $item->icon_image = $fullIconPath;
                    }
                    
                }
                $newValue = json_encode($decodedValue);
                return json_decode($newValue);
            }
        }
        return $value;
    }

}
