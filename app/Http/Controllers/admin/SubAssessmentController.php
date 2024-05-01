<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MainAssessment;
use App\Models\MainCategory;
use App\Models\SubAssessment;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubAssessmentController extends Controller
{
    public function sub_assessments()
    {
        $categories = MainAssessment::query()->where('status', 1)->get();
        $sub_categories = SubAssessment::query()->get();
        return view('admin.pages.content_management.sub_assessment.index', compact('categories', 'sub_categories'));
    }

    public function add_sub_assessment(Request $request)
    {
        // Validate incoming form data
        $request->validate([
            'title' => 'required|string',
            'assessment' => 'required|exists:main_assessments,id',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg',
            'status' => 'required|boolean',
            'order_number' => 'required|numeric',
        ]);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'sub_assessment' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $thumbnail = 'storage/sub_assessment/' . $filename;
        }

        // Create a new SubCategory instance and save it to the database
        $subCategory = SubAssessment::query()->create([
            'title' => $request->title,
            'assessment_id' => $request->assessment,
            'thumbnail' => $thumbnail,
            'status' => $request->status,
            'order_number' => $request->order_number
        ]);

        if ($subCategory) {
            return response()->json(['success' => true, 'message' => 'Sub Assessment created successfully']);
        } else {
            // Handle insertion failure
            return response()->json(['success' => false, 'message' => 'Failed to create subcategory']);
        }
    }

    public function update_sub_assessment_status(Request $request)
    {
        $id = $request->id;
        $status = $request->value;
        if ($status == 1) {
            $update = SubAssessment::query()->where('id', $id)->update(['status' => 0]);
        } else {
            $update = SubAssessment::query()->where('id', $id)->update(['status' => 1]);
        }

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'Sub Assessment status has been changed successfully'
            ]);
        }
    }

    public function delete_sub_assessment(Request $request)
    {
        try {
            $data = SubAssessment::query()->where('id', $request->record_id)->first();
            $data->thumbnail = str_replace('storage/', '', $data->thumbnail);
            $filePath = storage_path('app/public/' . $data->thumbnail);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $delete = SubAssessment::query()->where('id', $request->record_id)->delete();

            if ($delete) {
                return response()->json([
                    'success' => true,
                    'message' => 'Sub Assessment has been deleted successfully'
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

    public function edit_sub_assessment(Request $request)
    {
        $data = SubAssessment::query()->find($request->assessment_id);
        // Validate incoming form data
        $request->validate([
            'title' => 'required|string',
            'assessment' => 'required|exists:main_assessments,id',
            'thumbnail' => 'image|mimes:png,jpg,jpeg',
            'status' => 'required|boolean',
            'order_number' => 'required|numeric',
        ]);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'sub_assessment' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $thumbnail = 'storage/sub_assessment/' . $filename;

        } else {
            $thumbnail = $data->thumbnail;
        }

        $subCategory = SubAssessment::query()->where('id', $request->assessment_id)->update([
            'title' => $request->title,
            'assessment_id' => $request->assessment,
            'thumbnail' => $thumbnail,
            'status' => $request->status,
            'order_number' => $request->order_number
        ]);

        if ($subCategory) {
            return response()->json(['success' => true, 'message' => 'Sub Assessment updated successfully']);
        } else {
            // Handle insertion failure
            return response()->json(['success' => false, 'message' => 'Failed to create subcategory']);
        }
    }

    public function get_sub_assessment(Request $request)
    {
        $limit = $request->post('length');
        $start = $request->post('start');
        $searchTerm = $request->post('search')['value'];

        $fetch_data = null;
        $recordsTotal = null;
        $recordsFiltered = null;
        if ($searchTerm == '') {
            $fetch_data = SubAssessment::query()->orderBy('title','asc')
                ->offset($start)
                ->limit($limit)
                ->get();
            $recordsTotal = sizeof($fetch_data);
            $recordsFiltered = SubAssessment::query()->orderBy('title','asc')
                ->count();
        } else {
            $fetch_data = SubAssessment::query()->where(function ($query) use ($searchTerm) {
                $query->orWhere('title','LIKE', '%' . $searchTerm . '%');
                $query->orWhereHas('getAssessment',function ($subquery) use ($searchTerm){
                    $subquery->where('title', $searchTerm);
                });
            })
                ->orderBy('title','asc')
                ->offset($start)
                ->limit($limit)
                ->get();
            $recordsTotal = sizeof($fetch_data);
            $recordsFiltered = SubAssessment::query()->where(function ($query) use ($searchTerm) {
                $query->orWhere('title','LIKE', '%' . $searchTerm . '%');
                $query->orWhereHas('getAssessment',function ($subquery) use ($searchTerm){
                    $subquery->where('title', $searchTerm);
                });
            })
                ->orderBy('title','asc')
                ->count();
        }
        $data = array();
        $SrNo = $start + 1;
        foreach ($fetch_data as $row => $item) {
            $sub_array = array();
            $parent_assessment = $item->getAssessment->title;
            $sub_array['id'] = $SrNo;
            $sub_array['title'] = "<td>$item->title</td>";
            $sub_array['parent_assessment'] = "<td>$parent_assessment</td>";
            $sub_array['thumbnail'] = !empty($item->thumbnail) ? '<td><img src="' . asset($item->thumbnail) . '" alt="thumbnail" class="avatar-md"/></td>' : 'No Image Uploaded';
            $sub_array['status'] = '<div class="form-check form-switch"><input class="form-check-input" onchange="change_status(\'' . $item->id . '\', \'' . $item->status . '\')" ' . 'type="checkbox" id="flexSwitchCheckDefault" ' . ($item->status == 1 ? 'checked' : '') . ' value="' . $item->status . '"><label class="form-check-label" for="flexSwitchCheckDefault">' . ($item->status == 1 ? 'Active' : 'InActive') . '</label></div>';
            $sub_array['action'] = '<div class="d-flex gap-2">' .
                '<button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editSubCategoryModal" onclick="editRecord(\'' . $item->id . '\', \'' . $item->assessment_id . '\', \'' . $item->title . '\',\'' . $item->thumbnail . '\', \'' . $item->status . '\', \'' . $item->order_number . '\')"><i class="bx bx-edit"></i></button>' .
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
}
