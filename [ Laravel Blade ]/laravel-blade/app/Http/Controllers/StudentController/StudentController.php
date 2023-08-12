<?php

namespace App\Http\Controllers\StudentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\studentModel;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function __construct(){
        $this->list = new studentModel();
    }

    public function index(){
        $allStudents = $this->list->show_student();

        return view('crud.index')->with('allStudents', $allStudents);
    }

    public function create(){
        return view('crud.add');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'   => 'required|string|max:191',
            'age'    => 'required|integer|min:0',
            'gender' => 'required|string|max:191'
        ]);

        $data = [
            'name'   => $request->name,
            'age'    => $request->age,
            'gender' => $request->gender,
        ];

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $store = $this->list->add_student($data);

            return redirect()->back()->with('flash_message', 'Student Added Successfully!');
        }
    }

    public function edit($id){
        $edit = $this->list->edit_student($id);

        return view('crud.edit')->with('edit', $edit);
    }

    public function view($id){
        $view = $this->list->view_student($id);

        return view('crud.view')->with('view', $view);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'name'   => 'required|string|max:191',
            'age'    => 'required|integer|min:0',
            'gender' => 'required|string|max:191'
        ]);

        $data = [
            'name'   => $request->input('name'),
            'age'    => $request->input('age'),
            'gender' => $request->input('gender'),
        ];

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $update = $this->list->update_student($request->id, $data);

            return redirect()->back()->with('flash_message', 'Student Updated Successfully!');
        }
    }

    public function delete($id){
        $delete = $this->list->delete_student($id);

        return redirect()->back()->with(['delete', $delete, 'flash_message' => 'Student Successfully Deleted!']);
    }
}
