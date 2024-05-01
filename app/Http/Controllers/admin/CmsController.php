<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function privacy_policy()
    {
        $privacy_policy = PrivacyPolicy::query()->latest()->get();
        return view('admin.pages.cms.privacy_policy.index', compact('privacy_policy'));
    }

    public function add_privacy_policy(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'status' => 'required',
        ]);

        $add = PrivacyPolicy::query()->create([
            'detail' => $request->description,
            'status' => $request->status
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Privacy Policy added successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function edit_privacy_policy(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'status' => 'required',
        ]);

        $update = PrivacyPolicy::query()->where('id', $request->record_id)->update([
            'detail' => $request->description,
            'status' => $request->status
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'Privacy Policy updated successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function delete_privacy_policy(Request $request)
    {
        $delete = PrivacyPolicy::query()->where('id', $request->record_id)->delete();

        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Privacy Policy deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function update_privacy_policy_status(Request $request)
    {
        $id = $request->id;
        $status = $request->value;

        $getActiveRecord = PrivacyPolicy::query()->where('status', 1)->first();

        if ($status == 0) {
            // Set the status of the record with the given ID to the provided status
            PrivacyPolicy::query()->where('id', $id)->update(['status' => 1]);
        } else {
            // Set the status of the record with the given ID to the provided status
            PrivacyPolicy::query()->where('id', $id)->update(['status' => 0]);
        }

        // If the status is set to active (1), set the status of all other records to inactive (0)
        if (!empty($getActiveRecord)) {
            PrivacyPolicy::query()->where('id', '!=', $id)->update(['status' => 0]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Privacy Policy status updated successfully'
        ]);

    }

    public function term_and_condition()
    {
        $term_condition = TermCondition::query()->latest()->get();
        return view('admin.pages.cms.terms_and_condition.index', compact('term_condition'));
    }

    public function add_term_condition(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'status' => 'required',
        ]);

        $add = TermCondition::query()->create([
            'detail' => $request->description,
            'status' => $request->status
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'Term & Conditions added successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function edit_term_condition(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'status' => 'required',
        ]);

        $update = TermCondition::query()->where('id', $request->record_id)->update([
            'detail' => $request->description,
            'status' => $request->status
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'Term & Condition updated successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function delete_term_condition(Request $request)
    {
        $delete = TermCondition::query()->where('id', $request->record_id)->delete();

        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Term & Condition deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function update_term_condition_status(Request $request)
    {
        $id = $request->id;
        $status = $request->value;

        $getActiveRecord = TermCondition::query()->where('status', 1)->first();

        if ($status == 0) {
            // Set the status of the record with the given ID to the provided status
            TermCondition::query()->where('id', $id)->update(['status' => 1]);
        } else {
            // Set the status of the record with the given ID to the provided status
            TermCondition::query()->where('id', $id)->update(['status' => 0]);
        }

        // If the status is set to active (1), set the status of all other records to inactive (0)
        if (!empty($getActiveRecord)) {
            TermCondition::query()->where('id', '!=', $id)->update(['status' => 0]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Term & Condition status updated successfully'
        ]);
    }

    public function about_us()
    {
        $about_us = AboutUs::query()->latest()->get();
        return view('admin.pages.cms.about_us.index', compact('about_us'));
    }

    public function add_about_us(Request $request)
    {
        $validatedData = $request->validate([
            'icon_image' => 'required|array',
            'icon_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link.*' => 'nullable|url',
            'mission' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $icons = [];
        foreach ($validatedData['icon_image'] as $key => $image) {
            $icons[] = [
                'icon_image' => $image->store('icon_images', 'public'),
                'icon_link' => $validatedData['link'][$key] ?? null,
            ];
        }

        $add = AboutUs::query()->create([
            'icon' => $icons,
            'mission' => $validatedData['mission'],
            'status' => $validatedData['status'],
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'About Us added successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Some thing went wrong please try again later'
            ]);
        }

    }

    public function edit_about_us(Request $request)
    {
        $data = AboutUs::query()->where('id', $request->record_id)->first();
        $validatedData = $request->validate([
            'icon_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link.*' => 'nullable|url',
            'mission' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $icons = [];
        if ($request->hasFile('icon_image')) {
            foreach ($validatedData['icon_image'] as $key => $image) {
                $icons[] = [
                    'icon_image' => $image->store('icon_images', 'public'),
                    'icon_link' => $validatedData['link'][$key] ?? null,
                ];
            }
        } else {
            foreach (json_decode($data->icon) as $key => $existingIcon) {
                $icons[] = [
                    'icon_image' => $existingIcon->icon_image,
                    'icon_link' => $validatedData['link'][$key] ?? $existingIcon->icon_link,
                ];
            }
        }

        $add = AboutUs::query()->where('id', $request->record_id)->update([
            'icon' => $icons,
            'mission' => $validatedData['mission'],
            'status' => $validatedData['status'],
        ]);

        if ($add) {
            return response()->json([
                'success' => true,
                'message' => 'About Us updated successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Some thing went wrong please try again later'
            ]);
        }
    }

    public function delete_about_us(Request $request)
    {
        $delete = AboutUs::query()->where('id', $request->record_id)->delete();

        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'About Us deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function update_about_us_status(Request $request)
    {
        $id = $request->id;
        $status = $request->value;

        $getActiveRecord = AboutUs::query()->where('status', 1)->first();

        if ($status == 0) {
            // Set the status of the record with the given ID to the provided status
            AboutUs::query()->where('id', $id)->update(['status' => 1]);
        } else {
            // Set the status of the record with the given ID to the provided status
            AboutUs::query()->where('id', $id)->update(['status' => 0]);
        }

        // If the status is set to active (1), set the status of all other records to inactive (0)
        if (!empty($getActiveRecord)) {
            AboutUs::query()->where('id', '!=', $id)->update(['status' => 0]);
        }
        return response()->json([
            'success' => true,
            'message' => 'About Us status updated successfully'
        ]);
    }

    public function get_about_us_detail(Request $request)
    {
        $id = $request->id;
        $about_us = AboutUs::query()->where('id', $id)->first();
        if (!empty($about_us)) {
            $about_us_detail = array(
                'id' => $about_us->id,
                'icon' => $about_us->icon,
                'mission' => $about_us->mission,
                'message' => $about_us->message,
                'status' => $about_us->status,
            );

            return response()->json([
                'success' => true,
                'data' => $about_us_detail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => ''
            ]);
        }
    }
}
