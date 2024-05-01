<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $icons = SocialMedia::query()->latest()->get();
        return view('admin.pages.cms.social_media.index', compact('icons'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpeg,jpg',
            'link' => 'required'
        ]);

        $imagePath = $request->file('image')->store('social_media', 'public');
        $profile_image = $imagePath;

        $add = SocialMedia::query()->create([
            'link' => $request->link,
            'image' => $profile_image
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Social Media has been added successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later',
            ]);
        }
    }

    public function edit(Request $request)
    {
        $data = SocialMedia::query()->where('id',$request->record_id)->first();

        if($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('social_media', 'public');
            $profile_image = $imagePath;
        }
        else
        {
            $profile_image = $data->image;
        }
        $update = SocialMedia::query()->where('id', $request->record_id)->update([
            'link' => $request->link,
            'image' => $profile_image
        ]);

        if($update)
        {
            return response()->json([
                'success' => true,
                'message' => 'Social Media has been updated successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later',
            ]);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->record_id;
        $social_media = SocialMedia::query()->find($id);

        if (!$social_media) {
            return response()->json([
                'success' => false,
                'message' => 'Social Media not found'
            ]);
        }

        $social_image = str_replace('storage/', '', $social_media->image);
        $image_path = storage_path('app/public/' . $social_image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $delete = $social_media->delete();

        if ($delete) {

            return response()->json([
                'success' => true,
                'message' => 'Social Media has been deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, please try again later'
            ]);
        }
    }
}
