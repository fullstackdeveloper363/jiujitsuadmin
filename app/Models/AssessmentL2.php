<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentL2 extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getSubAssessment()
    {
        return $this->belongsTo(SubAssessment::class,  'sub_assessment_id');
    }

    public function getMarkAssessment()
    {
        return $this->hasMany(SubAssessment::class,  'child_assessment_id', 'id');
    }

    public function getVideoAttribute($value)
    {
        if (request()->segment(1) == 'api') {
            if (!empty($value)) {
                return asset($value);
            } else {
                return $value;
            }
        } else {
            return $value;
        }
    }

    public function getThumbnailAttribute($value)
    {
        if (request()->segment(1) == 'api') {
            if (!empty($value)) {
                return asset($value);
            } else {
                return $value;
            }
        } else {
            return $value;
        }
    }
}
