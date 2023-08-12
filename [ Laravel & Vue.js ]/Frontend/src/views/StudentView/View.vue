<template>
    <div>
  <div class="card">
    <div class="card-header">
      <h1>
        Students
        <RouterLink to="/student/create" class="btn btn-primary float-end">
          Add Student
        </RouterLink>
      </h1>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Created at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody v-if="this.students.length > 0">
          <tr v-for="(student, index) in this.students" :key="index">
            <td>{{ student.id }}</td>
            <td>{{ student.name }}</td>
            <td>{{ student.age }}</td>
            <td>{{ student.gender }}</td>
            <td>{{ student.created_at }}</td>
            <td>
                <RouterLink :to="{path: '/student/'+student.id+'/edit'}" class="btn btn-success">
                    Edit
                </RouterLink>

                <button type="button" @click="deleteStudent(student.id)" class="btn btn-danger">
                    Delete
                </button>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
            <tr>
                <td colspan="6">
                    Loading...
                </td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</template>

<script>
import axios from "axios";
export default {
    name: 'student',
  data() {
    return {
      students: [],
    };
  },
  mounted() {
    // console.log('I am here')
    this.getStudents();
  },
  methods: {
    getStudents(){
        axios.get('http://127.0.0.1:8000/api/list').then(res=>{
            this.students = res.data.students
            // console.log(this.students)

        });
    },
    deleteStudent(studentId){
        
        if(confirm('Are you sure, you want to delete this data?')){
            axios.delete(`http://127.0.0.1:8000/api/list/${studentId}/delete`).then(res => {
                alert(res.data.message);
                this.getStudents();
            });
            // console.log(studentId)
        }
    }
  },
};
</script>