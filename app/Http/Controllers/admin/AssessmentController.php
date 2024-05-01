<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MainAssessment;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AssessmentController extends Controller
{
    public function main_assessment()
    {
        $categories = MainAssessment::query()->orderBy('order_number')->get();
        return view('admin.pages.content_management.assessments.main_assessment',compact('categories'));
    }

    public function add_main_assessment(Request $request)
    {
        $request->validate([
           'title' => 'required',
           'thumbnail' => 'required|image|mimes:png,jpg,jpeg',
            'status' => 'required',
            'type' => 'required',
            'order_number' => 'required|numeric'
        ]);

        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'main_assessment' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $thumbnail =  'storage/main_assessment/'.$filename;
        }

        $add = MainAssessment::query()->create([
            'title' => $request->title,
            'thumbnail' => $thumbnail ?? null,
            'status' => $request->status,
            'type' => $request->type,
            'order_number' => $request->order_number,
        ]);

        if($add)
        {
            return response()->json([
                'success' => true,
                'message' => 'Main Assessment has been added successfully'
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function update_main_assessment(Request $request)
    {
        $data = MainAssessment::query()->where('id',$request->category_id)->first();
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'image|mimes:png,jpg,jpeg',
            'status' => 'required',
            'type' => 'required',
            'order_number' => 'required|numeric'
        ]);

        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(6) . '.' . $extension;
            $filePath = 'main_assessment' . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $thumbnail =  'storage/main_assessment/'.$filename;
        }
        else
        {
            $thumbnail = $data->thumbnail;
        }

        $update = MainAssessment::query()->where('id',$request->category_id)->update([
            'title' => $request->title,
            'thumbnail' => $thumbnail ?? null,
            'status' => $request->status,
            'type' => $request->type,
            'order_number' => $request->order_number,
        ]);

        if($update)
        {
            return response()->json([
                'success' => true,
                'message' => 'Main Assessment has been updated successfully'
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong please try again later'
            ]);
        }
    }

    public function delete_main_assessment(Request $request)
    {
        try{
            $data = MainAssessment::query()->where('id', $request->record_id)->first();
            $data->thumbnail = str_replace('storage/','',$data->thumbnail);
            $filePath = storage_path('app/public/' . $data->thumbnail);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $delete = MainAssessment::query()->where('id', $request->record_id)->delete();

            if ($delete) {
                return response()->json([
                    'success' => true,
                    'message' => 'Main Assessment has been deleted successfully'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong please try again later'
                ]);
            }
        }
        catch (\Exception $exception)
        {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
    public function update_main_assessment_status(Request $request)
    {
        $id = $request->id;
        $status = $request->value;
        if($status == 1)
        {
            $update = MainAssessment::query()->where('id',$id)->update(['status' => 0]);
        }
        else
        {
            $update = MainAssessment::query()->where('id',$id)->update(['status' => 1]);
        }

        if($update)
        {
            return response()->json([
                'success' => true,
                'message' => 'Main Assessment status has been changed successfully'
            ]);
        }
    }

    public function get_assessment(Request $request)
    {
        $limit = $request->post('length');
        $start = $request->post('start');
        $searchTerm = $request->post('search')['value'];

        $fetch_data = null;
        $recordsTotal = null;
        $recordsFiltered = null;
        if ($searchTerm == '') {
            $fetch_data = MainAssessment::query()->orderBy('order_number')
                ->offset($start)
                ->limit($limit)
                ->get();
            $recordsTotal = sizeof($fetch_data);
            $recordsFiltered = MainAssessment::query()->orderBy('order_number')
                ->count();
        } else {
            $fetch_data = MainAssessment::query()->where(function ($query) use ($searchTerm) {
                $query->orWhere('title', 'LIKE', '%' . $searchTerm . '%');
            })
                ->orderBy('order_number')
                ->offset($start)
                ->limit($limit)
                ->get();
            $recordsTotal = sizeof($fetch_data);
            $recordsFiltered = MainAssessment::query()->where(function ($query) use ($searchTerm) {
                $query->orWhere('title', 'LIKE', '%' . $searchTerm . '%');
            })
                ->orderBy('order_number')
                ->count();
        }
        $data = array();
        $SrNo = $start + 1;
        foreach ($fetch_data as $row => $item) {
            $sub_array = array();
            $sub_array['id'] = $SrNo;
            $sub_array['title'] = "<td>$item->title</td>";
            $sub_array['thumbnail'] = !empty($item->thumbnail) ? '<td><img src="' . asset($item->thumbnail) . '" alt="thumbnail" class="avatar-md"/></td>' : 'No Image Uploaded';
            $sub_array['type'] = "<td>$item->type</td>";
            $sub_array['status'] = '<div class="form-check form-switch"><input class="form-check-input" onchange="change_status(\'' . $item->id . '\', \'' . $item->status . '\')" ' . 'type="checkbox" id="flexSwitchCheckDefault" ' . ($item->status == 1 ? 'checked' : '') . ' value="' . $item->status . '"><label class="form-check-label" for="flexSwitchCheckDefault">' . ($item->status == 1 ? 'Active' : 'InActive') . '</label></div>';
            $sub_array['action'] = '<div class="d-flex gap-2">' .
                '<button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editMainCategoryModal" onclick="editRecord(\'' . $item->id . '\', \'' . $item->title . '\',\'' . $item->thumbnail . '\', \'' . $item->status . '\', \'' . $item->type . '\',\'' . $item->order_number . '\')"><i class="bx bx-edit"></i></button>' .
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
