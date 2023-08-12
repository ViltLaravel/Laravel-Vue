<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student_Model;

use Illuminate\Support\Facades\Validator;

class StudentController extends Controller      
{
    function __construct(){
        $this->list = new Student_Model();
    }

    public function index(){
        $show = $this->list->show_student();

        if($show->count() > 0){
            return response()->json([
                'status' => 200,
                'students' => $show
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function addStudent(Request $request)
        {
            // Validate the input data
            $validator = Validator::make($request->all(), [
                'name'   => 'required|string|max:191',
                'age'    => 'required|integer|min:0',
                'gender' => 'required|string|max:191',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors'  => $validator->messages()
                ], 422);
            } else {

                $data = [
                    'name'   => $request->name,
                    'age'    => $request->age,
                    'gender' => $request->gender,
                ];

                $add = $this->list->add_student($data);

                if ($add) {
                    return response()->json([
                        'student' => $add,
                        'status'  => 200,
                        'message' => 'Student Added Successfully!'
                    ], 200);
                } else {
                    return response()->json([
                        'status'  => 500,
                        'message' => 'Something Went Wrong!'
                    ], 500);
                }
            }
        }

    public function editStudent($id){
        $edit = $this->list->edit_student($id);

        if ($edit){
            return response()->json([
                'status' => 200,
                'student' => $edit
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such Student Found!'
            ], 404);
        }
    }

    public function editforStudent($id){
        $edit = $this->list->edit($id);

        if ($edit){
            return response()->json([
                'status' => 200,
                'student' => $edit
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such Student Found!'
            ], 404);
        }
    }

    public function updateStudent(Request $request){
        // Validate the input   
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:191',
            'age'    => 'required|integer|min:0',
            'gender' => 'required|string|max:191',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors'  => $validator->messages()
            ], 422);
        } else {
            $data = [
                'name' =>     $request->input('name'),
                'age'  =>     $request->input('age'),
                'gender' =>   $request->input('gender'),
            ];

            $update = $this->list->update_student($request->id, $data);

            if($update){
                return response()->json([
                    'status' => 200,
                    'message' => 'Student Updated Successfully!'
                ], 200);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'No Such Student Found!'
                ], 404);
            }
        }
    }

    public function deleteStudent($id){
        $delete = $this->list->delete_student($id);

        if ($delete){
            return response()->json([
                'status' => 200,
                'message' => 'Student Successfully Deleted!'
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such Student Found!'
            ], 404);
        }


    }
}
