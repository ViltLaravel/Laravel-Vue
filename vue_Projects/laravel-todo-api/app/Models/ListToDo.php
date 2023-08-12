<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListToDo extends Model
{
    use HasFactory;

    protected $table = 'todo';
    protected $fillable = [
        'todo_name',
        'title_todo'
    ];


    public function showlist(){
        return $this->all();
    }


    public function addtodo($data){
        return $this->create($data);
    }

    public function edit_todo($id){
        return $this->select('*')->whereid($id)->first();
    }

    public function update_todolist($id, $data){
        $update = $this->whereid($id);
        $update->update($data);

        return $update;
    }

    public function delete_todo($id)
    {
        $delete = $this->find($id);
        $delete->delete($id);
    }

}
