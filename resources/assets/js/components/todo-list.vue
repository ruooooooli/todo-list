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
                                            请添加任务!
                                        </td>
                                    </tr>
                                </template>
                                <tr>
                                    <td>
                                        <input type="text" v-model="newTodo" class="form-control">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" v-on:click="createTodo">添加</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data : function () {
            return {
                newTodo : '',
                todos   : [],
            };
        },
        methods: {
            deleteTodo : function (index) {
                this.todos.splice(index, 1);
            },
            createTodo : function () {
                if (this.newTodo === '') {
                    alert('请输入任务内容!');
                    return false;
                }

                this.todos.push({ 'name' : this.newTodo});
                this.newTodo = '';
            },
        },
    }
</script>

<style media="screen">
    .panel-default {
        margin-top: 5%;
    }
</style>
