<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AssessmentL2;
use App\Models\MainAssessment;
use App\Models\SubAssessment;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->get();
        $main_assessments = MainAssessment::query()->count();
        $sub_assessments = SubAssessment::query()->count();
        $child_assessments = AssessmentL2::query()->count();

        return view('admin.pages.index',compact('users', 'main_assessments', 'sub_assessments', 'child_assessments'));
    }
}

