@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8" >
        <div class="panel panel-default">
            <div class="panel-heading">
                User_Login
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                <form action="/login" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-2 control-label">Username</label>

                        <div class="col-sm-7">
                            <input type="text" name="Login_name" id="task-name" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name2"  class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-7">
                            <input type="text" name="Pass" id="task-name2" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-9 col-sm-3" >
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



        <div class="container">
            <div class="col-sm-offset-2 col-sm-8" >
                <div class="panel panel-default">
                    <div class="panel-heading">
                        SignUp
                    </div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- New Task Form -->
                        <form action="/user" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task-name" class="col-sm-2 control-label">Username</label>

                                <div class="col-sm-7">
                                    <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="task-name2"  class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-7">
                                    <input type="text" name="pass" id="task-name2" class="form-control" value="{{ old('task') }}">
                                </div>
                            </div>
                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-9 col-sm-3" >
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i>Add User
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


            <div class="col-sm-offset-2 col-sm-8">
                <!-- Current Tasks -->
                @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Users
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>User</th>
                            <th>Pass</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text"><div>{{ $task->name }}</div></td>
                                <td class="table-text"><div>{{ $task->pass }}</div></td>
                                <!-- Task Delete Button -->
                                <td>
                                    <form action="/task/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="col-sm-offset-9 col-sm-3" >
                                            <button type="submit" class="btn btn-danger" style="margin-right: auto;">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
    @endsection



