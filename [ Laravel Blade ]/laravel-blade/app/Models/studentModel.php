<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class studentModel extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'name',
        'age',
        'gender',
    ];


    public function show_student(){
        // return $this->all()->take(5);

        return DB::table('students')->select('*')->orderBy('name', 'ASC')->take(5)->get();
    }

    public function add_student($data){
        return $this->create($data);
    }

    public function edit_student($id){
        return $this->select('*')->whereid($id)->first();
    }

    public function view_student($id){
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
