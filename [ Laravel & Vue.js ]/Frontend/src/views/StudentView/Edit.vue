<template>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>Edit Student</h4>
      </div>
      <div class="card-body">
        <ul class="alert alert-warning" v-if="Object.keys(this.errorList).length > 0">
            <li class="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">
                {{ error[0] }}
            </li>
        </ul>
        <div class="mb-3">
          <label for="">Name</label>
          <input
            type="text"
            v-model="model.student.name"
            class="form-control"
          />
        </div>
        <div class="mb-3">
          <label for="">Age</label>
          <input type="text" v-model="model.student.age" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="">Gender</label>
          <input
            type="text"
            v-model="model.student.gender"
            class="form-control"
          />
        </div>
        <div class="mb-3">
          <button type="button" @click="updateStudent" class="btn btn-primary">
            Save
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: "studentEdit",
  data() {
    return {
      studentID: '',
      errorList: '',
      model: {
        student: {
          name: "",
          age: "",
          gender: "",
        },
      },
    };
  },
  mounted(){

    // console.log(this.$route.params.id)
    this.studentID = this.$route.params.id;
    this.getStudentData(this.$route.params.id);
  },
  methods: {

    getStudentData(studentId){

      axios.get(`http://127.0.0.1:8000/api/list/${studentId}/edit`).then(res => {
        console.log(res.data.student)

        this.model.student = res.data.student
      })

      .catch(function (error) {
          if (error.response) {
            if (error.response.status == 404) {
                // mythis.errorList = error.response.data.message;
                alert(error.response.data.message);
            }
          }
        });
    },

    updateStudent() {
        var mythis = this;//use for the catch error validation
      axios
        .put(`http://127.0.0.1:8000/api/list/${this.studentId}/edit`, this.model.student)
        .then((res) => {
          console.log(res.data);
          alert(res.data.message);

          this.errorList = '';
        })
        .catch(function (error) {
          if (error.response) {
            if (error.response.status == 422) {
                mythis.errorList = error.response.data.errors;
            }
            if (error.response.status == 404) {
                alert(error.response.data.message);
            }
          } else if (error.request) {
            console.log(error.request);
          } else {
            console.log("Error", error.message);
          }
          console.log(error.config);
        });
    },
  },
};
</script>