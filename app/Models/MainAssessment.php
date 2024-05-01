<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainAssessment extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function getThumbnailAttribute($value)
    {
        if (request()->segment(1) == 'api') {
            return asset($value);
        } else {
            return $value;
        }
    }

    public function getSubAssessments()
    {
        return $this->hasMany(SubAssessment::class , 'assessment_id' , 'id');
    }
}
