<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Model extends Model
{
    use HasFactory;

    protected $table = 'student_list';
    protected $fillable = [
        'name',
        'age',
        'gender',
    ];


    public function show_student(){
        return $this->all();
    }

    public function add_student($data){
        return $this->create($data);
    }

    public function edit_student($id){
        return $this->select('*')->whereid($id)->first();
    }

    public function edit($id){
        return $this->select('*')->whereid($id)->first();
    }

    public function update_student($id, $data){
        $update = $this->whereid($id);

        $update->update($data);

        return $update;
    }

    public function delete_student($id){
        $delete = $this->find($id);

        $delete->delete($id);

        return $delete;
    }
}

