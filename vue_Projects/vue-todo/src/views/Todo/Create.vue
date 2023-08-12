<template>
    <div>
        <ul class="alert alert-warning" v-if="Object.keys(this.errorList).length > 0">
            <li class="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">
                {{ error[0] }}
            </li>
        </ul>
    </div>
    <div class="container col-4 offset">
        <div class="card mt-3" style="background-color: #C8AE7D;">
            <div class="card-header">
                <h4>
                    <router-link to="/todo" class="float-start">
                        <img style="height: 45px; width: 45px;" src="icons/back_arrow.png" alt="backImg">
                    </router-link>
                </h4>        
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <input type="text"  v-model="model.todos.todo" class="form-control" name="todo" placeholder="Title" required>
                    </div>
                    <div class="mb-3">
                        <input type="text"  v-model="model.todos.title_todo" class="form-control" name="todo" placeholder="Notes" required>
                    </div>
                    <button type="submit" @click="addTodo" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
export default {
    name: "create",
    data() {
        return {
            errorList: '',
            model: {
                todos: {
                    todo: "",
                    title_todo: "",
                },
            },
        };
    },
    methods: {
        clearInputs() {
            this.todo = '',
            this.title_todo = ''
        },
        addTodo() {
            var mythis = this;
            axios.post("http://127.0.0.1:8000/api/item/store", this.model.todos).then((res) => {
                alert(res.data.message);
                // console.log(res.data);
                this.clearInputs();
                this.errorList();
            })
            .catch(function (error) {
                if (error.response) {
                    if (error.response.status == 422) {
                        mythis.errorList = error.response.data.errors;
                    }
                } else if (error.request) {
                    console.log(error.request);
                } else {
                    console.log("Error", error.message);
                }
                console.log(error.config);
            });
            }
    }
}
</script>