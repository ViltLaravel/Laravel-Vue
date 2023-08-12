<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h4>
                    Student List
                    <RouterLink to="/" class="btn btn-primary float-end">Add Student</RouterLink>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>9</td>
                            <td>Nicole Amoguis</td>
                            <td>22</td>
                            <td>Male</td>
                            <td>9</td>
                            <td>
                                <RouterLink to="/" class="btn btn-success">Edit</RouterLink>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import { RouterLink } from 'vue-router';




</script>