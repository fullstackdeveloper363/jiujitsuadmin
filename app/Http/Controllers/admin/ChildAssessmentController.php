<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AssessmentL2;
use App\Models\SubAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Service\VideoHandler;

class ChildAssessmentController extends Controller
{
    public function index()
    {
        $assessments = AssessmentL2::query()->latest()->get();
        $sub_assessment = SubAssessment::query()->get();
        return view('admin.pages.content_management.assessment_L2.index', compact('assessments', 'sub_assessment'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_assessments' => 'required',
            'skill_point' => 'required',
            'status' => 'required',
            'thumbnail' => 'required|mimes:png,jpeg,jpg',
            'order_number' => 'required|numeric',
            'youtube_link' => 'required_without:video|nullable|string|regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=)[a-zA-Z0-9_-]{11}$/',
            'video' => 'required_without:youtube_link|nullable|mimes:mp4,mkv,mov',
        ], [
            'video.required_without' => 'Video is required',
            'youtube_link.required_without' => 'Youtube Link is required',
            'youtube_link.regex' => 'Please provide valid URL with correct format'
        ]);

        if ($request->hasFile('video')) {
            $extension = $request->video->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'child_assessments/videos/' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($request->video));
            $video = 'storage/child_assessments/videos/' . $filename;
        } else {
            $video = NULL;
        }

        if ($request->hasFile('thumbnail')) {
            $extension = $request->thumbnail->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'child_assessments/thumbnail/' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($request->thumbnail));
            $thumbnail = 'storage/child_assessments/thumbnail/' . $filename;
        } else {
            $thumbnail = NULL;
        }

        // Create a new SubCategory instance and save it to the database
        $add = AssessmentL2::query()->create([
            'title' => $request->title,
            'sub_assessment_id' => $request->sub_assessments,
            'video' => $video,
            'skill_point' => $request->skill_point,
            'status' => $request->status,
            'thumbnail' => $thumbnail,
            'order_number' => $request->order_number,
            'youtube_link' => $request->youtube_link,
            'type' => 'Practicing',
        ]);

        if ($add) {
            return response()->json(['success' => true, 'message' => 'Child Assessment has been created successfully']);
        } else {
            // Handle insertion failure
            return response()->json(['success' => false, 'message' => 'Failed to create subcategory']);
        }
    }

    public function update_child_assessment_status(Request $request)
    {
        $id = $request->id;
        $status = $request->value;
        if ($status == 1) {
            $update = AssessmentL2::query()->where('id', $id)->update(['status' => 0]);
        } else {
            $update = AssessmentL2::query()->where('id', $id)->update(['status' => 1]);
        }

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'Child Assessment status has been changed successfully'
            ]);
        }
    }

    public function delete_child_assessment(Request $request)
    {
        try {
            $data = AssessmentL2::query()->where('id', $request->record_id)->first();
            if (!empty($data->video))
            {
                $data->video = str_replace('storage/', '', $data->video);
                $filePath = storage_path('app/public/' . $data->video);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            if(!empty($data->thumbnail))
            {
                $data->thumbnail = str_replace('storage/', '', $data->thumbnail);
                $image_path = storage_path('app/public/' . $data->thumbnail);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }


            $delete = AssessmentL2::query()->where('id', $request->record_id)->delete();

            if ($delete) {
                return response()->json([
                    'success' => true,
                    'message' => 'Child Assessment has been deleted successfully'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong please try again later'
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function edit_child_assessment(Request $request)
    {
        $data = AssessmentL2::query()->find($request->id);
        // Validate incoming form data
        $request->validate([
            'title' => 'required',
            'sub_assessments' => 'required',
            'skill_point' => 'required',
            'status' => 'required',
            'video' => 'mimes:mp4,mkv,mov',
            'order_number' => 'required|numeric',
            'youtube_link' => 'nullable|string|regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=)[a-zA-Z0-9_-]{11}$/',
        ], [
            'youtube_link.regex' => 'Please provide valid URL with correct format'
        ]);

        // Handle Video upload
        if ($request->hasFile('video')) {
            $extension = $request->video->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'child_assessments/videos/' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($request->video));
            $video = 'storage/child_assessments/videos/' . $filename;
        } else {
            $video = $data->video;
        }

        if ($request->hasFile('thumbnail')) {
            $extension = $request->thumbnail->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'child_assessments/thumbnail/' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($request->thumbnail));
            $thumbnail = 'storage/child_assessments/thumbnail/' . $filename;
        } else {
            $thumbnail = $data->thumbnail;
        }

        $subCategory = AssessmentL2::query()->where('id', $request->id)->update([
            'title' => $request->title,
            'sub_assessment_id' => $request->sub_assessments,
            'video' => $video,
            'skill_point' => $request->skill_point,
            'status' => $request->status,
            'thumbnail' => $thumbnail,
            'order_number' => $request->order_number,
            'youtube_link' => $request->youtube_link,
            'type' => 'Practicing',
        ]);

        if ($subCategory) {
            return response()->json(['success' => true, 'message' => 'Child Assessment has been updated successfully']);
        } else {
            // Handle insertion failure
            return response()->json(['success' => false, 'message' => 'Failed to create subcategory']);
        }
    }

    public function get_assessment_level_2(Request $request)
    {
        $limit = $request->post('length');
        $start = $request->post('start');
        $searchTerm = $request->post('search')['value'];

        $fetch_data = null;
        $recordsTotal = null;
        $recordsFiltered = null;
        if ($searchTerm == '') {
            $fetch_data = AssessmentL2::query()->orderBy('title', 'asc')
                ->offset($start)
                ->limit($limit)
                ->get();
            $recordsTotal = sizeof($fetch_data);
            $recordsFiltered = AssessmentL2::query()->orderBy('title', 'asc')
                ->count();
        } else {
            $fetch_data = AssessmentL2::query()->where(function ($query) use ($searchTerm) {
                $query->orWhere('title','LIKE', '%' . $searchTerm . '%');
                $query->orWhereHas('getSubAssessment',function ($subquery) use ($searchTerm){
                    $subquery->where('title', $searchTerm);
                });
            })
                ->orderBy('title', 'asc')
                ->offset($start)
                ->limit($limit)
                ->get();
            $recordsTotal = sizeof($fetch_data);
            $recordsFiltered = AssessmentL2::query()->where(function ($query) use ($searchTerm) {
                $query->orWhere('title','LIKE', '%' . $searchTerm . '%');
                $query->orWhereHas('getSubAssessment',function ($subquery) use ($searchTerm){
                    $subquery->where('title', $searchTerm);
                });
            })
                ->orderBy('title', 'asc')
                ->count();
        }
        $data = array();
        $SrNo = $start + 1;
        foreach ($fetch_data as $row => $item) {
            $sub_array = array();
            $parent_assessment = $item->getSubAssessment->title;
            $video_handler = new VideoHandler();
            $video_info = $video_handler->getVideoInfo($item->youtube_link);
            if ($video_info != false) {
                $embedded_video_url = $video_info->html;
            } else {
                $embedded_video_url = false;
            }
            $sub_array['id'] = $SrNo;
            $sub_array['title'] = "<td>$item->title</td>";
            $sub_array['parent_assessment'] = "<td>$parent_assessment</td>";
            $sub_array['thumbnail'] = !empty($item->thumbnail) ? '<td><img src="' . asset($item->thumbnail) . '" alt="thumbnail" class="avatar-md"/></td>' : 'No Image Uploaded';
            $sub_array['video'] = !empty($item->video) ? '<td><video controls autoplay width="200" height="200" src="' . asset($item->video) . '"></video></td>' : 'No Video Uploaded';
            $sub_array['youtube'] = $embedded_video_url != false ? '<td>' . $embedded_video_url . '</td>' : 'No Youtube link added';
            $sub_array['skill_point'] = '<td>' . Str::limit($item->skill_point, 30) . '</td>';
            $sub_array['status'] = '<div class="form-check form-switch"><input class="form-check-input" ' . 'onchange="change_status(\'' . $item->id . '\', \'' . $item->status . '\')" ' . 'type="checkbox" id="flexSwitchCheckDefault" ' . ($item->status == 1 ? 'checked' : '') . ' value="' . $item->status . '"><label class="form-check-label" for="flexSwitchCheckDefault">' . ($item->status == 1 ? 'Active' : 'InActive') . '</label></div>';

            $sub_array['action'] = '<div class="d-flex gap-2">' .
                '<button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editRecord(\'' . $item->id . '\')"><i class="bx bx-edit"></i></button>' .
                '<button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteUser(\'' . $item->id . '\')"><i class="bx bx-trash"></i></button>' .
                '</div>';

            $SrNo++;
            $data[] = $sub_array;
        }
        $json_data = array(
            "draw" => intval($request->post('draw')),
            "iTotalRecords" => $recordsTotal,
            "iTotalDisplayRecords" => $recordsFiltered,
            "aaData" => $data
        );
        echo json_encode($json_data);
    }

    public function fetch_child_data(Request $request)
    {
        $id = $request->id;
        $data = AssessmentL2::query()->find($id);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}

