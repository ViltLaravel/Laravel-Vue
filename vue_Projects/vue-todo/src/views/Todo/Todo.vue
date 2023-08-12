<template>
    <div class="container col-4 offset">
        <div class="card mt-3" style="background-color: #C8AE7D;">
            <div class="card-header">
                <h4 style="color: white;">
                    Notes
                    <router-link to="/create" class="float-end">
                        <img style="height: 50px; width: 50px;" src="icons/add.svg" alt="addImg">
                    </router-link>
                </h4>
            </div>
            <div class="card-body">
                <div class="card mb-3" style="background-color: #61677A; color: white;" v-for="(todo, index) in this.todo" :key="index">
                   <div class="card-body">
                    <div class="card-header">
                        <h4>
                            {{ todo.title_todo }}
                            <input type="checkbox" class="form-check-input float-end" @change="handleCheckboxChange(todo.id)">
                        </h4>
                        <p>{{ todo.todo_name }}</p>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            todo: [],
        };
    },
    methods: {
        getTodo() {
            axios.get(`http://127.0.0.1:8000/api/items/`).then(res => {
                this.todo = res.data.todo
                // console.log(res.data.todo);
            });
        },
        async deleteTodoItem(id) {
            try {
                const response = await axios.delete(`http://127.0.0.1:8000/api/item/${id}`);
                // Handle successful deletion response if needed
                console.log('Item deleted:', id);
                await this.getTodo(); // Fetch the updated list after deleting an item
            } catch (error) {
                console.error(error);
            }
        },
        handleCheckboxChange(id) {
            if (event.target.checked) {
                this.deleteTodoItem(id);
            }
        }
    },
    mounted() {
        this.getTodo();
    }
}
</script>