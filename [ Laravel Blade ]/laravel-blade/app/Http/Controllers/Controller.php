<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\studentModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function __construct(){
        $this->list = new studentModel();
    }

    public function index()
    {
        $show = $this->list->show_student();
    
        if ($show->count() > 0) {
            return view('crud.index', [
                'show' => $show,
                'response' => [
                    'status' => 200,
                ],
            ]);
        } else {
            return view('crud.index', [
                'response' => [
                    'status' => 404,
                    'message' => 'No students found!',
                ],
            ]);
        }
    }  
    
    public function addshow(Request $request)
    {
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string|max:191'
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('student')
                ->withInput()
                ->withErrors($validator);
        }
        return view('crud.add');
    }

    public function add(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'age'  => 'required|integer|min:0',
            'gender' => 'required|string|max:191'
        ]);

        $data = [
            'name'  => $request->name,
            'age'   => $request->age,
            'gender'=> $request->gender,
        ];

        if($validator->fails()){
            return view('crud.add', [
                'status' => 422,
                'errors' => $validator->messages()
            ]);
        }else{
            $add = $this->list->add_student($data);

            return view('crud.add', [
                'add' => $add,
                'status' => 200,
                'message' => 'Student Added Successfully'
             ]);
        }
    }
}
