<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\AssessmentL2;
use App\Models\BeltRank;
use App\Models\Bookmark;
use App\Models\Competition;
use App\Models\MainAssessment;
use App\Models\MarkAssessmentL2;
use App\Models\PrivacyPolicy;
use App\Models\Promotion;
use App\Models\SocialMedia;
use App\Models\SubAssessment;
use App\Models\TermCondition;
use App\Models\Training;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use \Statickidz\GoogleTranslate;
use App\Helpers\GetStringTranslate;

class ApiController extends Controller
{
    protected $response_status = 200;

    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'first_name' => 'required',
            'last_name' => 'required',
            'profile_image' => 'nullable|image'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('public/user/profile_images');
            $profile_image = str_replace('public/', 'storage/', $imagePath);
        }

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'training_affiliation' => $request->training_affiliation,
            'password' => Hash::make($request->password),
            'status' => 1,
            'description' => $request->description,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'profile_image' => $profile_image ?? NULL,
        ]);


        $userdata = User::query()->where('id', $user->id)->first();

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User registered Successfully',
                'data' => $userdata
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later',
                'data' => ''
            ]);
        }

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        $check_email = User::query()->where('email', $request->email)->exists();

        if ($check_email === false) {
            return response()->json(['status' => false, 'message' => 'Email Does Not Exists']);
        }

        $CheckPassword = User::query()->where('email', $request['email'])->first();

        if ($CheckPassword->status == 0) {
            return response()->json(['status' => false, 'message' => 'Your Account is not approved yet']);
        }

        if ($CheckPassword->password != null) {
            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['status' => false, 'message' => 'Password is incorrect']);
            }
        }
        $user = User::query()->where('email', $request['email'])->first();

        $get_user_latest_promotions = Promotion::query()->where('user_id', $user->id)->latest('date')->first();

        if (!empty($get_user_latest_promotions)) {
            $beltImageId = BeltRank::query()->find($get_user_latest_promotions->belt_image_id);
        }else
        {
            $beltImageId = Null;
        }

        $UserDetail = array(
            'id' => $user->id,
            'name' => $user->name,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'gender' => $user->gender,
            'dob' => $user->dob,
            'profile_image' => $user->profile_image,
            'training_affiliation' => $user->training_affiliation,
            'status' => $user->status,
            'description' => $user->description,
            'belt_image' => $beltImageId,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        );
        $data = array(
            'success' => true,
            'message' => 'Login Successfully',
            'data' => $UserDetail
        );
        return response()->json($data, $this->response_status);
    }

    public function check_email(Request $request)
    {
        $email = $request->email;

        $user = User::query()->where('email', $email)->first();

        if (!empty($user)) {
            $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            $user->where('email', $email)->update([
                'otp' => $otp
            ]);
            $latest_user = User::query()->where('email', $email)->first();
            return response()->json([
                'success' => true,
                'message' => 'Your email is valid . Otp has been sent to your email',
                'data' => $latest_user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
                'data' => ''
            ]);
        }
    }

    public function verify_otp(Request $request)
    {
        $otp = $request->otp;
        $email = $request->email;
        $user = User::query()->where('email', $email)->first();

        if (!empty($user)) {
            // Check if entered OTP matches the stored OTP for the user
            if ($user->otp === $otp) {
                // OTP matches
                $latest_user = User::query()->where('email', $email)->where('otp', $otp)->first();
                return response()->json([
                    'success' => true,
                    'message' => 'OTP is valid.',
                    'data' => $latest_user
                ]);
            } else {
                // OTP does not match
                return response()->json([
                    'success' => false,
                    'message' => 'Entered OTP is invalid.',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ]);
        }
    }

    public function update_password(Request $request)
    {
        $email = $request->email;
        $newPassword = $request->password;
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|same:confirm_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }
        $user = User::query()->where('email', $email)->first();

        if (!empty($user)) {

            // Old password matches, update the password
            $user->password = Hash::make($newPassword);
            $user->save();

            $latest_user = User::query()->where('email', $email)->first();
            return response()->json([
                'success' => true,
                'message' => 'Password updated successfully',
                'data' => $latest_user
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ]);
        }
    }

    public function get_main_assessment($user_id,Request $request)
    {

        $acceptLanguage = $request->header('Accept-Language');

        if(isset($acceptLanguage) || !empty($acceptLanguage)){
            $targetlang = $acceptLanguage;
        }else{
            $targetlang = "en"; 
        }
        $sourcelang = "en";

        $top_assessment = MainAssessment::query()->whereHas('getSubAssessments')->with(['getSubAssessments.getChildAssessments', 'getSubAssessments' => function ($q) {
            $q->withCount('getChildAssessments');
        }])->where('type', 'top')->where('status', 1)->orderBy('order_number')->get();


        $bottom_assessment = MainAssessment::query()->whereHas('getSubAssessments')->with(['getSubAssessments.getChildAssessments', 'getSubAssessments' => function ($q) {
            $q->withCount('getChildAssessments');
        }])->where('type', 'bottom')->where('status', 1)->orderBy('order_number')->get();

        $global_top_total_child_assessments_count = 0;
        $total_mastered_assessments = 0;
        
        foreach ($top_assessment as $key) {
            $sub_assessment = $key->getSubAssessments;
            $total_child_assessments = array_sum($sub_assessment->pluck('get_child_assessments_count')->toArray());
            $global_top_total_child_assessments_count += $total_child_assessments;
            foreach ($sub_assessment as $x) {
                $child_assessments = $x->getChildAssessments;
                foreach ($child_assessments as $v) {
                    $mastered_count = MarkAssessmentL2::query()->where('user_id',$user_id)->where('type', 'Mastered')->where('child_assessment_id', $v->id)->count();
                    $total_mastered_assessments += $mastered_count;
                }
            }
        }
        
        $total_bottom_mastered_assessments = 0;
        $global_bottom_total_child_assessments_count = 0;
        foreach ($bottom_assessment as $item) {
            $sub_assessment = $item->getSubAssessments;
            $total_child_assessments = array_sum($sub_assessment->pluck('get_child_assessments_count')->toArray());
            $global_bottom_total_child_assessments_count += $total_child_assessments;

            foreach ($sub_assessment as $data) {
                $child_assessments = $data->getChildAssessments;
                foreach ($child_assessments as $i) {
                    $mastered_count = MarkAssessmentL2::query()->where('user_id',$user_id)->where('type', 'Mastered')->where('child_assessment_id', $i->id)->count();
                    $total_bottom_mastered_assessments += $mastered_count;
                }
            }
        }

        
        $top_assessment = $top_assessment->map(function ($item) use ($user_id,$global_top_total_child_assessments_count,$sourcelang,$targetlang) {

            //Get Total Child Assessments
            $sub_assessment = SubAssessment::query()->where('assessment_id', $item->id)->pluck('id')->toArray();
            $child_assessments = AssessmentL2::query()->whereIn('sub_assessment_id', $sub_assessment)->get();
            $total_child_assessments = $child_assessments->count();
            $mastered_assessments = MarkAssessmentL2::query()->where('type', 'Mastered')->where('user_id',$user_id)->whereIn('child_assessment_id', AssessmentL2::query()->whereIn('sub_assessment_id', $sub_assessment)->pluck('id')->toArray())->get();
            $total_top_mastered_assessments = $mastered_assessments->count();
            $x_percent = $total_top_mastered_assessments == 0 ? 0 : ($total_top_mastered_assessments / $total_child_assessments) * 100;
            $skill_percentage = $global_top_total_child_assessments_count == 0 ? 0 : ($total_child_assessments / $global_top_total_child_assessments_count) * 100;
            //Get Liked
            $saved = Bookmark::query()->where('user_id', $user_id)->where('module_id', $item->id)->where('type', 'main_assessments')->first();
            // echo "<pre>";print_r($lang);
            $detail = [
                'id' => $item->id,
                'title' => GetStringTranslate::getStringTranslate("en", $targetlang, $item->title),
                'thumbnail' => $item->thumbnail,
                'is_saved' => !empty($saved) ? 'Yes' : 'NO',
                'skill_count' => $total_child_assessments,
                'skill_percentage' => round($skill_percentage),
                'x_percent' => round($x_percent)
            ];

            return $detail;
        });
        // echo "<pre>";print_r($lang);
        $bottom_assessment = $bottom_assessment->map(function ($data) use ($user_id,$global_bottom_total_child_assessments_count,$sourcelang,$targetlang) {
            $sub_assessment = SubAssessment::query()->where('assessment_id', $data->id)->pluck('id')->toArray();
            $child_assessments = AssessmentL2::query()->whereIn('sub_assessment_id', $sub_assessment)->get();
            $total_child_assessments = $child_assessments->count();
            $skill_percentage = $global_bottom_total_child_assessments_count == 0 ? 0 : ($total_child_assessments / $global_bottom_total_child_assessments_count) * 100;
            $mastered_assessments = MarkAssessmentL2::query()->where('type', 'Mastered')->where('user_id',$user_id)->whereIn('child_assessment_id', AssessmentL2::query()->whereIn('sub_assessment_id', $sub_assessment)->pluck('id')->toArray())->get();
            $all_bottom_mastered_assessments = $mastered_assessments->count();
            $x_percent = $all_bottom_mastered_assessments == 0 ? 0 : ($all_bottom_mastered_assessments / $total_child_assessments) * 100;
            $saved = Bookmark::query()->where('user_id', $user_id)->where('module_id', $data->id)->where('type', 'main_assessments')->first();
            $detail = [
                'id' => $data->id,
                'title' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $data->title),
                'thumbnail' => $data->thumbnail,
                'is_saved' => !empty($saved) ? 'Yes' : 'NO',
                'skill_count' => $total_child_assessments,
                'skill_percentage' => round($skill_percentage),
                'x_percent' => round($x_percent)
            ];
            return $detail;
        });

        if ($top_assessment->count() > 0 || $bottom_assessment->count() > 0) {
            return response()->json([
                'success' => true,
                'total_top_percentage' => $total_mastered_assessments == 0 ? 0 : round(($total_mastered_assessments / $global_top_total_child_assessments_count) * 100),
                'top' => $top_assessment,
                'total_bottom_percentage' => $total_bottom_mastered_assessments == 0 ? 0 : round(($total_bottom_mastered_assessments / $global_bottom_total_child_assessments_count) * 100),
                'bottom' => $bottom_assessment,
                ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
            ]);
        }
    }

    public function get_sub_assessments($id, $user_id)
    {
        $acceptLanguage = $request->header('Accept-Language');

        if(isset($acceptLanguage) || !empty($acceptLanguage)){
            $targetlang = $acceptLanguage;
        }else{
            $targetlang = "en"; 
        }

        $sourcelang = "en";
        $sub_assessment = SubAssessment::query()->where('assessment_id', $id)->where('status', 1)->orderBy('title','asc')->get();

        $sub_assessment_detail = $sub_assessment->map(function ($item) use ($user_id) {
            //Get Liked
            $saved = Bookmark::query()->where('user_id', $user_id)->where('module_id', $item->id)->where('type', 'sub_assessments')->first();

            $detail = [
                'id' => $item->id,
                'title' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->title),
                'parent_assessment' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->getAssessment->title),
                'thumbnail' => $item->thumbnail,
                'is_saved' => !empty($saved) ? 'Yes' : 'NO',
            ];
            return $detail;
        });

        if ($sub_assessment_detail->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'data' => $sub_assessment_detail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
            ]);
        }
    }

    public function get_child_assessments($id, $user_id, Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language');

        if(isset($acceptLanguage) || !empty($acceptLanguage)){
            $targetlang = $acceptLanguage;
        }else{
            $targetlang = "en"; 
        }

        $sourcelang = "en";
        $child_assessment = AssessmentL2::query()->where('sub_assessment_id', $id)->where('status', 1)->orderBy('title','asc')->get();

        $child_assessment_detail = $child_assessment->map(function ($item) use ($user_id, $id, $sourcelang, $targetlang) {
            //Get Liked
            $saved = Bookmark::query()->where('user_id', $user_id)->where('module_id', $id)->where('type', 'assessment_l2_s')->first();

            if (!empty($item->video)) {
                $embedded_video_url = false;
            } else {
                $embedded_video_url = true;
            }

            $mark = MarkAssessmentL2::query()->where('user_id', $user_id)->where('child_assessment_id', $item->id)->first();

            $detail = [
                'id' => $item->id,
                'title' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->title),
                'sub_assessment' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->getSubAssessment->title),
                'video' => $item->video,
                'thumbnail' => !empty($item->getRawOriginal('thumbnail')) ? $item->thumbnail : null,
                'skill_point' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->skill_point),
                'type' => !empty($mark) ? $mark->type : 'Practicing',
                'is_saved' => !empty($saved) ? 'Yes' : 'NO',
                'youtube_link' => $item->youtube_link,
                'youtube_iframe' => $embedded_video_url
            ];
            return $detail;
        });

        if ($child_assessment_detail->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'data' => $child_assessment_detail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
            ]);
        }
    }

    public function get_assessment_level2_detail($id, $user_id)
    {
        $assessment = AssessmentL2::query()->where('id', $id)->where('status', 1)->first();

        $assessments_except_one = AssessmentL2::query()
            ->where('status', 1)
            ->where('id', '!=', $id)
            ->get();

        $mark = MarkAssessmentL2::query()->where('child_assessment_id', $id)->where('user_id', $user_id)->first();
        if (!empty($assessment)) {
            $detail = array(
                'id' => $assessment->id,
                'title' => $assessment->title,
                'video' => $assessment->video,
                'skill_point' => $assessment->skill_point,
                'type' => !empty($mark) ? $mark->type : 'Practicing',
                'related_skills' => $assessments_except_one
            );
        } else {
            $detail = [];
        }


        if (!empty($detail)) {
            return response()->json([
                'success' => true,
                'data' => $detail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => 'No Record Found'
            ]);
        }
    }

    public function apply_filter(Request $request)
    {
        $search = $request->search;

        $sub_guards = AssessmentL2::query()->with(['getSubAssessment', 'getSubAssessment.getAssessment'])->where('title', 'like', '%' . $search . '%')->orWhere('skill_point', 'like', '%' . $search . '%')->get()->toArray();
        $main_assessments = MainAssessment::query()->where('title', 'like', "%$search%")->get()->toArray();
        $sub_assessments = SubAssessment::query()->with('getAssessment')->where('title', 'like', "%$search%")->get()->toArray();


        if (!empty($search)) {
            $merged_results = array_merge($sub_guards, $main_assessments, $sub_assessments);
        } else {
            $merged_results = $sub_guards;
        }


        $detail = array_map(function ($item) {
            $top = false;
            if (array_key_exists('skill_point', $item)) {
                $level = 3; // Child Assessments
                if (isset($item['sub_assessment_id'])) {
                    if ($item['get_sub_assessment']['get_assessment']['type'] == "top") {
                        $top = true;
                    }
                }

            } elseif (array_key_exists('assessment_id', $item)) {
                $level = 2; // Sub Assessments
                if (isset($item['assessment_id'])) {
                    if ($item['get_assessment']['type'] == "top") {
                        $top = true;
                    }
                }
            } else {
                $level = 1; // Main Assessments
                if ($item['type'] == "top") {
                    $top = true;
                }
            }


            $guards = [
                'id' => $item['id'],
                'title' => $item['title'],
                'thumbnail' => $item['thumbnail'] ?? null,
                'video' => $item['video'] ?? null,
                'skill_point' => $item['skill_point'] ?? null,
                'level' => $level,
                'top_brain' => $top,
            ];
            return $guards;
        }, $merged_results);

        if (!empty($detail)) {
            return response()->json([
                'success' => true,
                'data' => $detail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => 'No Record Found'
            ]);
        }
    }

    public function get_cms_data(Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language');

        if(isset($acceptLanguage) || !empty($acceptLanguage)){
            $targetlang = $acceptLanguage;
        }else{
            $targetlang = "en"; 
        }
        $sourcelang = "en";

        if (!empty($privacy_policy)) {
            $privacy_policy = $privacy_policy->where('status', 1)->latest()->get();
        } else {
            $privacy_policy = GetStringTranslate::getStringTranslate($sourcelang, $targetlang, "No Record Found");
        }

        // Privacy Policy
        $about_us = AboutUs::query();
        $aboutusarr = [];
        if (!empty($about_us)) {
            $about_us = $about_us->where('status', 1)->latest()->get();
            foreach ($about_us as $item) {
                $aboutusarr = [
                    "id" => $item->id,
                    "icon" => $item->icon,
                    "mission" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->mission),
                    "status" => $item->status,
                    "created_at" => $item->created_at,
                    "updated_at" => $item->updated_at,
                ];


            }
        } else {
            $about_us = GetStringTranslate::getStringTranslate($sourcelang, $targetlang, "No Record Found");
        }

        // Terms and Condition
        $term_condition = TermCondition::query();
        $term_conditionarr = [];
        if (!empty($term_condition)) {
            $term_condition = $term_condition->where('status', 1)->latest()->get();
            foreach ($term_condition as $item) {
                $term_conditionarr = [
                    "id" => $item->id,
                    "detail" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->detail),
                    "status" => $item->status,
                    "created_at" => $item->created_at,
                    "updated_at" => $item->updated_at,
                ];


            }
        } else {
            $term_condition = GetStringTranslate::getStringTranslate($sourcelang, $targetlang, "No Record Found");
        }

        $social_media = SocialMedia::query();

        if (!empty($social_media)) {
            $social_media = $social_media->latest()->get();
        } else {
            $social_media = GetStringTranslate::getStringTranslate($sourcelang, $targetlang, "No Record Found");
        }

        return response()->json([
            'success' => true,
            'privacy_policy' => $privacy_policy,
            'about_us' => $aboutusarr,
            'term_condition' => $term_conditionarr,
            'social_media' => $social_media
        ]);
    }

    public function edit_profile(Request $request)
    {
        $user_id = $request->user_id;

        $user_data = User::query()->where('id', $user_id)->first();

        if (!empty($user_data)) {
            // User Image
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('public/user/profile_images');
                $profile_image = str_replace('public/', 'storage/', $imagePath);
            } else {
                $profile_image = $user_data->profile_image;
            }

            // User Name
            if ($request->has('user_name')) {
                $user_name = $request->user_name;
            } else {
                $user_name = $user_data->name;
            }

            //Email
            if ($request->has('email')) {
                $email = $request->email;
            } else {
                $email = $user_data->email;
            }

            //Gender
            if ($request->has('gender')) {
                $gender = $request->gender;
            } else {
                $gender = $user_data->ggender;
            }

            // Training Affiliation
            if ($request->has('training_affiliation')) {
                $training_affiliation = $request->training_affiliation;
            } else {
                $training_affiliation = $user_data->training_affiliation;
            }

            // Description
            if ($request->has('description')) {
                $description = $request->description;
            } else {
                $description = $user_data->description;
            }

            // First Name
            if ($request->has('first_name')) {
                $first_name = $request->first_name;
            } else {
                $first_name = $user_data->first_name;
            }

            //Last Name
            if ($request->has('last_name')) {
                $last_name = $request->last_name;
            } else {
                $last_name = $user_data->last_name;
            }


            //DOB
            if ($request->has('dob')) {
                $dob = $request->dob;
            } else {
                    $dob = $user_data->dob;
            }

            $update = User::query()->where('id', $user_id)->update([
                'name' => $user_name,
                'email' => $email,
                'gender' => $gender,
                'training_affiliation' => $training_affiliation,
                'profile_image' => $profile_image,
                'description' => $description,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'dob' => $dob
            ]);

            // Get Updated User
            $user = User::query()->where('id', $user_id)->first();

            $get_user_latest_promotions = Promotion::query()->where('user_id', $user->id)->latest('date')->first();

            if (!empty($get_user_latest_promotions)) {
                $user->belt_image = BeltRank::query()->find($get_user_latest_promotions->belt_image_id);
            } else {
                $user->belt_image = null;
            }

            if ($update) {
                return response()->json([
                    'success' => true,
                    'message' => 'User Profile has been updated successfully',
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong please try again later'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not Found'
            ]);
        }
    }

    public function update_user_password(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::query()->find($user_id);

        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:8|same:confirm_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }
        if ($user) {
            $newPassword = $request->new_password;
            $user->password = Hash::make($newPassword);
            $user->save();
            return response()->json(['success' => true, 'message' => 'Password updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'User not found']);
        }
    }

    public function delete_account($id)
    {
        if (!empty($id)) {
            $user = User::query()->where('id', $id)->first();

            if (!empty($user)) {
                // Get User
                $delete = User::query()->where('id', $id)->delete();

                if ($delete) {
                    return response()->json(['success' => true, 'message' => 'User account has been deleted successfully']);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'User not found']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid Data']);
        }
    }

    public function add_to_bookmark(Request $request)
    {
        $user_id = $request->user_id;
        $id = $request->id;
        $type = $request->type;

        $saved = Bookmark::query()->where('type', $type)->where('module_id', $id)->first();

        if ($saved) {
            Bookmark::query()->where('type', $type)->where('module_id', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'This module is successfully unsaved'
            ]);
        } else {
            Bookmark::query()->create([
                'user_id' => $user_id,
                'module_id' => $id,
                'type' => $type,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'This module is successfully saved'
            ]);
        }
    }

    public function get_bookmarks($user_id)
    {
        $acceptLanguage = $request->header('Accept-Language');

        if(isset($acceptLanguage) || !empty($acceptLanguage)){
            $targetlang = $acceptLanguage;
        }else{
            $targetlang = "en"; 
        }
        $sourcelang = "en";

        $bookmarks = Bookmark::query()->where('user_id', $user_id)->get();

        $categorizedBookmarks = [];

        foreach ($bookmarks as $bookmark) {
            $type = $bookmark->type;
            $moduleId = $bookmark->module_id;

            switch ($type) {
                case 'main_assessments':
                    $details = MainAssessment::query()->where('id', $moduleId)->first();
                    $is_top = $details->type;
                    break;
                case 'sub_assessments':
                    $details = SubAssessment::query()->where('id', $moduleId)->first();
                    $is_top = MainAssessment::query()->where('id', $details->assessment_id)->first()->type;
                    break;
                case 'assessment_l2_s':
                    $details = AssessmentL2::query()->where('id', $moduleId)->first();
                    $data = SubAssessment::query()->where('id',$details->sub_assessment_id)->first();
                    $is_top = MainAssessment::query()->where('id', $data->assessment_id)->first()->type;
                    break;
                default:
                    continue 2; // Skip this iteration and move to the next foreach loop
            }

            if ($details !== null) {
                $level = ($type === 'main_assessments') ? 1 : (($type === 'sub_assessments') ? 2 : 3);

                $detail = [
                    'id' => $details->id ?? null,
                    'title' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $details->title) ?? null,
                    'thumbnail' => $details->thumbnail ?? null,
                    'skill_point' => $details->skill_point ?? null,
                    'video' => $details->video ?? null,
                    'level' => $level,
                    'top_brain' => ($is_top == 'top') ? true : false,
                ];

                $categorizedBookmarks[] = $detail;
            }
        }

        if (!empty($categorizedBookmarks)) {
            return response()->json([
                'success' => true,
                'data' => $categorizedBookmarks
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
            ]);
        }
    }


    public function get_user_by_id($id,Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language');

        if(isset($acceptLanguage) || !empty($acceptLanguage)){
            $targetlang = $acceptLanguage;
        }else{
            $targetlang = "en"; 
        }
        $sourcelang = "en";

        $user = User::query()->where('id', $id)->first();
        // print_r($user->id);
        $userarr = [];

            $userarr = [
                "id" => $user->id,
                "name" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $user->name),
                "first_name" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $user->first_name),
                "last_name" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $user->last_name),
                "email" => $user->email,
                "description" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $user->description),
                "gender" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $user->gender),
                "dob" => $user->dob,
                "training_affiliation" => $user->training_affiliation,
                "weight_division" => $user->weight_division,
                "competition_count" => $user->competition_count,
                "status" => $user->status,
                "otp" => $user->otp,
                "fcm_token" => $user->fcm_token,
                "email_verified_at" => $user->email_verified_at,
                "profile_image" => $user->profile_image,
                "created_at" => $user->created_at,
                "updated_at" => $user->updated_at,
            ];

        $get_user_latest_promotions = Promotion::query()->where('user_id', $user->id)->latest('date')->first();

        if (!empty($get_user_latest_promotions)) {
            $user->belt_image = BeltRank::query()->find($get_user_latest_promotions->belt_image_id);

        } else {
            $user->belt_image = null;
        }



        if (!empty($userarr)) {
            return response()->json([
                'success' => true,
                'data' => $userarr
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
            ]);
        }
    }


    public function add_trainings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'academy' => 'required',
            'professor' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        $add = Training::query()->create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'academy' => $request->academy,
            'professor' => $request->professor,
            'notes' => $request->notes
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Training added successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function edit_trainings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'academy' => 'required',
            'user_id' => 'required',
            'training_id' => 'required|exists:trainings,id'
        ], [
            'training_id.required' => 'Training ID is required',
            'training_id.exists' => 'Training ID should be valid',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }
        $data = Training::query()->where('id', $request->training_id)->first();
        $add = Training::query()->where('id', $request->training_id)->update([
            'user_id' => $request->user_id,
            'date' => $request->date ?? $data->date,
            'academy' => $request->academy ?? $data->academy,
            'professor' => $request->professor ?? $data->professor,
            'notes' => $request->notes ?? $data->notes
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Training has been updated successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function delete_training(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'training_id' => 'required|exists:trainings,id'
        ], [
            'training_id.required' => 'Training ID is required',
            'training_id.exists' => 'Training ID should be valid',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        $data = Training::query()->where('id', $request->training_id)->delete();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Training has been deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function get_logbook_training($user_id,Request $request)
    {
        if (!empty($user_id)) {
            $acceptLanguage = $request->header('Accept-Language');

            if(isset($acceptLanguage) || !empty($acceptLanguage)){
                $targetlang = $acceptLanguage;
            }else{
                $targetlang = "en"; 
            }
            $sourcelang = "en";

            $data = Training::query()->where('user_id', $user_id)->latest('date')->get();
            if ($data->count() > 0) {

                $firstRecord = Training::query()->where('user_id', $user_id)->orderBy('date', 'asc')->first();
                $lastRecord = \Carbon\Carbon::now();
                $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $firstRecord->date);
                $diffInDays = $lastRecord->diffInDays($startDate);

                if ($diffInDays === 0) {
                    $training_days = '1 day';
                } else {
                    $years = floor($diffInDays / 365);
                    $months = floor(($diffInDays % 365) / 30);
                    $days = $diffInDays - ($years * 365) - ($months * 30);

                    $training_days = '';

                    if ($years > 0) {
                        $training_days .= "$years Yr";
                        if ($years > 1) $training_days .= "s";
                        $training_days .= ", ";
                    }

                    if ($months > 0) {
                        $training_days .= "$months Mo";
                        if ($months > 1) $training_days .= "s";
                        $training_days .= ", ";
                    }

                    if ($days > 0) {
                        $training_days .= "$days Day";
                        if ($days > 1) $training_days .= "s";
                    }
                }

                // Remove trailing comma and space if present
                $training_days = rtrim($training_days, ', ');


                $training_detail = $data->map(function ($item) use ($user_id, $sourcelang, $targetlang) {

                    $detail = [
                        'id' => $item->id,
                        'date' => $item->date,
                        'academy' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->academy),
                        'professor' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->professor),
                        'notes' => $item->notes,
                    ];
                    return $detail;
                });

                return response()->json([
                    'success' => true,
                    'training_days' => $training_days,
                    'history' => $training_detail
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
            ]);
        }
    }

    public function add_competition(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'competition_name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'age_division' => 'required',
            'belt_rank' => 'required',
            'competitors' => 'required',
            'matches' => 'required',
            'wins' => 'required',
            'result' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        if ($request->matches < $request->wins) {
            return response()->json([
                'success' => false,
                'message' => 'No of matches cannot be greater than number of wins'
            ]);
        }

        $add = Competition::query()->create([
            'user_id' => $request->user_id,
            'competition_name' => $request->competition_name,
            'date' => $request->date,
            'location' => $request->location,
            'gender' => $request->gender,
            'weight' => $request->weight,
            'age_division' => $request->age_division,
            'belt_rank' => $request->belt_rank,
            'competitors' => $request->competitors,
            'matches' => $request->matches,
            'wins' => $request->wins,
            'result' => $request->result,
            'notes' => $request->notes,
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Competition added successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function edit_competition(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'competition_id' => 'required|exists:competitions,id',
            'competition_name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'age_division' => 'required',
            'belt_rank' => 'required',
            'competitors' => 'required',
            'matches' => 'required',
            'wins' => 'required',
            'result' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        if ($request->matches < $request->wins) {
            return response()->json([
                'success' => false,
                'message' => 'No of matches cannot be greater than number of wins'
            ]);
        }

        $data = Competition::query()->find($request->competition_id);
        $add = Competition::query()->where('id', $request->competition_id)->update([
            'user_id' => $request->user_id,
            'competition_name' => $request->competition_name ?? $data->competition_name,
            'date' => $request->date ?? $data->date,
            'location' => $request->location ?? $data->location,
            'gender' => $request->gender ?? $data->gender,
            'weight' => $request->weight ?? $data->weight,
            'age_division' => $request->age_division ?? $data->age_division,
            'belt_rank' => $request->belt_rank ?? $data->belt_rank,
            'competitors' => $request->competitors ?? $data->competitors,
            'matches' => $request->matches ?? $data->matches,
            'wins' => $request->wins ?? $data->wins,
            'result' => $request->result ?? $data->result,
            'notes' => $request->notes ?? $data->notes,
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Competition has been updated successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }


    public function delete_competition(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'competition_id' => 'required|exists:competitions,id'
        ], [
            'competition_id.required' => 'Training ID is required',
            'competition_id.exists' => 'Training ID should be valid',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        $data = Competition::query()->where('id', $request->competition_id)->delete();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Competition has been deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }


    public function get_competitions($user_id,Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language');

        if(isset($acceptLanguage) || !empty($acceptLanguage)){
            $targetlang = $acceptLanguage;
        }else{
            $targetlang = "en"; 
        }
        $sourcelang = "en";
        if (!empty($user_id)) {
            
            // Get Competitions
            $competitions = Competition::query()->where('user_id', $user_id)->latest('date')->get();

            if ($competitions->count() > 0) {
                $wins = 0;
                $totalMatches = 0;
                $gold = 0;
                $silver = 0;
                $bronze = 0;
                $medalCount = 0;
                $competitionsarr = [];
                foreach ($competitions as $competition) {
                    $wins += $competition->wins;
                    $totalMatches += $competition->matches;

                    $medalType = strtolower($competition->result);
                    if ($medalType === 'gold') {
                        $gold++;
                        $medalCount++;
                    } elseif ($medalType === 'silver') {
                        $silver++;
                        $medalCount++;
                    } elseif ($medalType === 'bronze') {
                        $bronze++;
                        $medalCount++;
                    }
                    $competitionsarr[] = [
                        "id" => $competition->id,
                        "user_id" => $competition->user_id,
                        "competition_name" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $competition->competition_name),
                        "date" => $competition->date,
                        "location" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $competition->location),
                        "gender" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $competition->gender),
                        "weight" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $competition->weight),
                        "age_division" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $competition->age_division),
                        "belt_rank" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $competition->belt_rank),
                        "competitors" => $competition->competitors,
                        "matches" => $competition->matches,
                        "wins" => $competition->wins,
                        "result" => $competition->result,
                        "notes" => $competition->notes,
                        "created_at" => $competition->created_at,
                        "updated_at" => $competition->updated_at,
                    ];
                }

                $lose = $totalMatches - $wins;
                return response()->json([
                    'success' => true,
                    'win' => $wins,
                    'lose' => $lose,
                    'matches' => $totalMatches,
                    'gold' => $gold,
                    'silver' => $silver,
                    'bronze' => $bronze,
                    'medalCount' => $medalCount,
                    // 'history' => $competitions,
                    'history' => $competitionsarr,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
                ]);
            }

        } else {
            return response()->json([
                'success' => false,
                'message' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
            ]);
        }
    }

    public function add_promotion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'belt_image_id' => 'required|exists:belt_ranks,id',
            'date' => 'required',
            'academy' => 'required',
            'professor' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }


        $add = Promotion::query()->create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'belt_image_id' => $request->belt_image_id,
            'academy' => $request->academy,
            'professor' => $request->professor,
            'notes' => $request->notes,
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Promotion added successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function edit_promotion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'promotion_id' => 'required|exists:promotions,id',
            'date' => 'required',
            'academy' => 'required',
            'professor' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        $data = Promotion::query()->where('id', $request->promotion_id)->first();


        $add = Promotion::query()->where('id', $request->promotion_id)->update([
            'user_id' => $request->user_id,
            'date' => $request->date ?? $data->date,
            'belt_image_id' => $request->belt_image_id ?? $data->belt_image_id,
            'academy' => $request->academy ?? $data->academy,
            'professor' => $request->professor ?? $data->professor,
            'notes' => $request->notes ?? $data->notes,
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Promotion has been updated successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function delete_promotion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'promotion_id' => 'required|exists:promotions,id'
        ], [
            'promotion_id.required' => 'Training ID is required',
            'promotion_id.exists' => 'Training ID should be valid',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        $data = Promotion::query()->where('id', $request->promotion_id)->delete();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Promotion has been deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }

    }

    public function get_promotions($user_id,Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language');

        if(isset($acceptLanguage) || !empty($acceptLanguage)){
            $targetlang = $acceptLanguage;
        }else{
            $targetlang = "en"; 
        }
        $sourcelang = "en";
        if (!empty($user_id)) {
            // Get Promotions

            $promotions = Promotion::query()->where('user_id', $user_id)->latest('date')->get();

            

            $promotions->map(function ($item) use ($sourcelang,$targetlang) {
                $beltImageId = BeltRank::query()->find($item->belt_image_id);
                // $item->belt_image = !empty($beltImageId) ? $beltImageId : NULL;

                $arrbeltImageId = [
                    "id" => $beltImageId->id,
                    "image" => $beltImageId->image,
                    "title" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $beltImageId->title),
                    "created_at" => $beltImageId->created_at,
                    "updated_at" => $beltImageId->updated_at,
                ];
                $item->belt_image = !empty($arrbeltImageId) ? $arrbeltImageId : NULL;

                return $item;
            });

            $beltImageIdarr = [];
            if ($promotions->count() > 0) {
                // Get latest Promotion
                $latest_promotions = Promotion::query()->where('user_id', $user_id)->latest('date')->first();
                $beltImageId = BeltRank::query()->find($latest_promotions->belt_image_id);

                $beltImageIdarr[] = [
                    "id" => $beltImageId->id,
                    "image" => $beltImageId->image,
                    "title" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $beltImageId->title),
                    "created_at" => $beltImageId->created_at,
                    "updated_at" => $beltImageId->updated_at,
                ];

                // foreach ($promotions as $item) {
                //     $promotions[] = [
                //         // "id" => $item->id,
                //         "user_id" => $item->user_id,
                //         "belt_image_id" => $item->belt_image_id,
                //         "date" => $item->date,
                //         "academy" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->academy),
                //         "professor" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->professor),
                //         "notes" => $item->notes,
                //         "created_at" => $item->created_at,
                //         "updated_at" => $item->updated_at,
                //     ];
    
    
                // }


                return response()->json([
                    'success' => true,
                    'current_belt_rank' => $latest_promotions->belt_rank,
                    'current_belt_image' => !empty($beltImageIdarr) ? $beltImageIdarr : NULL,
                    'history' => $promotions,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
                    // 'message' => 'No Record Found',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
                // 'message' => 'No Record Found',
            ]);
        }
    }

    public function add_video_view($id, $user_id)
    {

        // Check if the user has already viewed this assessment
        $viewed = View::query()
            ->where('user_id', $user_id)
            ->where('child_assessment_id', $id)
            ->exists();

        if (!$viewed) {
            $child_assessment = AssessmentL2::query()->find($id);

            if (!empty($child_assessment)) {
                $view = View::query();

                // Record the view in the assessment_views table
                $added = View::query()->create([
                    'user_id' => $user_id,
                    'child_assessment_id' => $id,
                    'no_of_views' => 0
                ]);

                $view->where('id', $added->id)->increment('no_of_views', 1);

                return response()->json([
                    'success' => true,
                    'message' => 'video added to view',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No sub assessment found'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Already Video is viewed by this user ID'
            ]);
        }
    }

    public function update_fcm_token(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fcm_token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        $user_id = $request->user_id;
        $user = User::query();

        $data = $user->where('id', $user_id)->exists();

        if ($data) {
            // Update FCM Token
            $user->where('id', $user_id)->update([
                'fcm_token' => $request->fcm_token
            ]);
            return response()->json([
                'success' => true,
                'message' => 'FCM Token updated Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found'
            ]);
        }
    }

    public function mark_assessment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'child_assessment_id' => 'required',
            'user_id' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ]);
        }

        $add = MarkAssessmentL2::query()->updateOrCreate([
            'child_assessment_id' => $request->child_assessment_id,
            'user_id' => $request->user_id,
        ], [
            'user_id' => $request->user_id,
            'child_assessment_id' => $request->child_assessment_id,
            'type' => $request->type
        ]);

        AssessmentL2::query()->where('id',$request->child_assessment_id)->update([
            'type' => $request->type
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Assessment marked Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User Not Found'
            ]);
        }
    }

    public function get_belt_ranks(Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language');

        if(isset($acceptLanguage) || !empty($acceptLanguage)){
            $targetlang = $acceptLanguage;
        }else{
            $targetlang = "en"; 
        }
        $sourcelang = "en";

        $data = BeltRank::query()->get();
        $dataarr = [];

        foreach ($data as $item) {
            $dataarr[] = [
                "id" => $item->id,
                "image" => $item->image,
                "title" => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, $item->title),
                "created_at" => $item->created_at,
                "updated_at" => $item->updated_at,
            ];
        }
        

        if($data->count()> 0)
        {
            return response()->json([
                'success' => true,
                'message' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'Request Processed Successfully'),
                'data' => $dataarr,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => GetStringTranslate::getStringTranslate($sourcelang, $targetlang, 'No Record Found'),
                'data' => [],
            ]);
        }
    }

}
