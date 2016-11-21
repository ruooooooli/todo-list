<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>任务清单</h2>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>
                                        任务名称
                                    </td>
                                    <td>
                                        操作
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="todos.length">
                                    <tr v-if="todos.length" v-for="(todo, index) in todos">
                                        <td>
                                            {{ todo.name }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm">完成</button>
                                            <button type="button" class="btn btn-danger btn-sm" v-on:click="deleteTodo(index)">删除</button>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="2">

                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <input type="text" v-model="newTodo" v-on:keyup.enter="createTodo" class="form-control" placeholder="请输入任务 回车添加">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        mounted : function () {
            let that = this;
            axios.get('http://code.app/todo')
                .then(function (response) {
                    let data    = response.data.data;
                    that.todos  = data.todos;
                });
        },
        data : function () {
            return {
                newTodo : '',
                todos   : [],
            };
        },
        methods: {
            deleteTodo : function (index) {
                let that = this;

                axios.post('http://code.app/todo/' + id, {
                    '_method' : 'DELETE',
                })
                .then(function (response) {
                    if (response.data.code === 'success') {
                        that.todos.splice(index, 1);
                    }
                });
            },
            createTodo : function () {
                let that = this;
                if (that.newTodo === '') {
                    alert('请输入任务内容!');
                    return false;
                }

                axios.post('http://code.app/todo', {
                    'name' : that.newTodo,
                })
                .then(function (response) {
                    if (response.data.code === 'success') {
                        that.todos.push({ 'name' : that.newTodo});
                        that.newTodo = '';
                    } else {
                        alert(response.message);
                    }
                });
            },
        },
    }
</script>

<style media="screen">
    .panel-default {
        margin-top: 5%;
    }
</style>
