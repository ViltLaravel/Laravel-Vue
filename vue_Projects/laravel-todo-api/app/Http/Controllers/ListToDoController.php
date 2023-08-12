<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListToDo;
use DB;
use Illuminate\Support\Facades\Validator;

class ListToDoController extends Controller
{


    function __construct()
    {
        $this->listtodo = new ListToDo;
    }

    public function index(){

        $todo = $this->listtodo->showlist();

        return response()->json(['todo' => $todo, 'status' => 200 ], 200);
    }


    public function addList(Request $request){
        $validator = Validate::make($request->all(), [
            'todo_name' => 'required|string|max: 191',
            'title_todo' => 'required|string|max: 191'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors'  => $validator->messages()
            ], 422);
        }else {
            $data = [

                'todo_name' => $request->todo,
                'title_todo' => $request->title_todo
            ];

            $list = $this->listtodo->addtodo($data);

            if($list) {
                return response()->json([
                    'todo' => $list,
                    'status' => 200,
                    'message' => 'Note successfully added!'
                ], 200);
            }
        }
    }

    public function editList($id){
        $edit_todo = $this->listtodo->edit_todo($id);
        return response()->json([$edit_todo, 'status' => true]);
    }


    public function updateList(Request $request){
        $data = [

            'todo_name' => $request->input('todo_name')
        ];

        $list = $this->listtodo->update_todolist($request->id, $data);

        return response()->json([$list, 'status' => true]);
    }

    public function deleteList($id){
        $list = $this->listtodo->delete_todo($id);

        return response()->json(['status'=> true, $list]);
    }
}
