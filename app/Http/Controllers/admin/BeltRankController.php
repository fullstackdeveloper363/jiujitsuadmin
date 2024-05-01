<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BeltRank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeltRankController extends Controller
{
    public function index()
    {
        $belt_rank = BeltRank::query()->paginate(10);
        return view('admin.pages.belt_rank.index',compact('belt_rank'));
    }

    public function add(Request $request)
    {
        $request->validate([
           'title' => 'required',
           'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->hasFile('image')) {
            $extension = $request->image->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'belt_rank' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($request->image));
            $Image = 'storage/belt_rank/' . $filename;
        }
        else
        {
            $Image = NULL;
        }

        $add = BeltRank::query()->create([
           'title' => $request->title,
           'image' => $Image,
        ]);

        if ($add) {
            return response()->json(['success' => true, 'message' => 'Belt Rank has been added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to create subcategory']);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);
        $data = BeltRank::query()->where('id',$request->id)->first();
        if ($request->hasFile('image')) {
            $extension = $request->image->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'belt_rank' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($request->image));
            $Image = 'storage/belt_rank/' . $filename;
        }
        else
        {
            $Image = $data->image;
        }


        $add = BeltRank::query()->where('id',$request->id)->update([
            'title' => $request->title,
            'image' => $Image,
        ]);

        if ($add) {
            return response()->json(['success' => true, 'message' => 'Belt Rank has been updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to create subcategory']);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->record_id;
        $belt_rank = BeltRank::query()->find($id);

        if (!$belt_rank) {
            return response()->json([
                'success' => false,
                'message' => 'Belt Rank not found'
            ]);
        }

        $image = str_replace('storage/', '', $belt_rank->image);
        $image_path = storage_path('app/public/' . $image);
        if (file_exists($image_path)) {

            unlink($image_path);
        }

        $delete = $belt_rank->delete();

        if ($delete) {

            return response()->json([
                'success' => true,
                'message' => 'Belt Rank has been deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, please try again later'
            ]);
        }
    }
}
