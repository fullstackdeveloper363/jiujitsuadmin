<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Promotion;
use App\Models\Training;
use App\Models\User;
use App\Service\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->paginate(10);
        return view('admin.pages.users.index',compact('users'));
    }
    public function add_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'affiliations' => 'required',
            'belt' => 'required',
            'competition_count' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
            'password' => 'required|min:8'
        ]);

        // Upload and store the profile image
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('storage/user/profile_images', 'public');
            $profile_image = $imagePath;
        }

        $add = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'training_affiliation' => $request->affiliations,
            'belt_rank' => $request->belt,
            'competition_count' => $request->competition_count,
            'profile_image' => $profile_image,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'description' => $request->description
        ]);

        if($add)
        {
            return response()->json([
                'success' => true,
                'message' => 'User has been added successfully',
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later',
            ]);
        }
    }

    public function delete_user(Request $request)
    {
        $delete = User::query()->where('id',$request->user_id)->delete();

        if($delete)
        {
            return response()->json([
                'success' => true,
                'message' => 'User has been deleted Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Some thing went wrong please try again later.'
            ]);
        }
    }

    public function update_status(Request $request)
    {
        $user_id = $request->user_id;

        // User Data
        $data = User::query()->where('id',$request->user_id)->first();

        $value = $request->value;

        if($value == 1)
        {
           $update =  User::query()->where('id',$user_id)->update([
                'status' => 0
            ]);
        }
        else
        {
            $update = User::query()->where('id',$user_id)->update([
                'status' => 1
            ]);
        }

        if($update)
        {
            $notification = [
                'title' => 'User Status Changed',
                'body' => 'Your account status has been changed by Admin',
            ];
//            Notification::send_notification($data->fcm_token,[], $notification);

            return response()->json([
                'success' => true,
                'message' => 'User status has been changed successfully'
            ]);
        }
    }

    public function get_user_detail(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::query()->where('id',$user_id)->first();
        if(!empty($user))
        {
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        }
        else
        {
            return response()->json([
                'success' => true,
                'data' => '',
            ]);
        }
    }

    public function edit_user(Request $request)
    {
        $user = User::query()->where('id',$request->user_id)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'affiliations' => 'required',
            'belt' => 'required',
            'competition_count' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required'
        ]);

        // Upload and store the profile image
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('storage/user/profile_images', 'public');
            $profile_image = $imagePath;
        }else
        {
            $profile_image = $user->profile_image;
        }

        if($request->filled('password') && $request->password != null)
        {
            $password = Hash::make($request->password);
        }
        else
        {
            $password = $user->password;
        }
        $update = User::query()->where('id',$request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'training_affiliation' => $request->affiliations,
            'belt_rank' => $request->belt,
            'competition_count' => $request->competition_count,
            'profile_image' => $profile_image,
            'password' => $password,
            'status' => $request->status,
            'description' => $request->description
        ]);

        if($update)
        {
            return response()->json([
                'success' => true,
                'message' => 'User has been updated successfully',
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later',
            ]);
        }
    }

    public function user_details($id)
    {
        if(!empty($id))
        {
            $user = User::query()->where('id',$id)->first();

            // Trainings
            $trainings = Training::query()->where('user_id',$id)->get();

            // Promotions
            $promotions = Promotion::query()->where('user_id',$id)->get();

            // Competitions
            $competition = Competition::query()->where('user_id',$id)->get();

            return  view('admin.pages.users.view_user',compact('user', 'promotions' , 'trainings' , 'competition'));
        }
        else
        {
            return redirect()->route('users');
        }
    }
}
