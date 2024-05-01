<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAssessment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAssessment()
    {
        return $this->belongsTo(MainAssessment::class , 'assessment_id');
    }

    public function getChildAssessments()
    {
        return $this->hasMany(AssessmentL2::class , 'sub_assessment_id' , 'id');
    }

    public function getThumbnailAttribute($value)
    {
        if (request()->segment(1) == 'api') {
            return asset($value);
        } else {
            return $value;
        }
    }
}
