@extends('layouts.app')
@section('content')
    <div class="text-center mt-5">
        <h1 style="color: rgb(233, 10, 77);">Todo List</h1>

    </div>



    <form method="post" action="{{route('todo.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <input type="text" name='todo' placeholder="Type New Todo" class="col-10 form-control">
            <input type="submit" value='Add' class="col-2">
        </div>
    </form>
    <div>
        @include('flash_message')
    </div>
    <div class="row todo" id="todo">

        <?php $n = 1;?>
        @foreach ($todos as $todo)
            <div>
                @if($todo->complete == 1)
                    <div class="todolst">
                        <p style="text-decoration: line-through;display:inline">{{$n++}}:&nbsp;{{$todo->todo}}</p>
                        <a href="{{route('todo.delete',$todo->id)}}" class="btn btn-danger"
                           style="float:right">Delete</a>
                    </div>
                @else
                    <div class="todolst">
                        <p style="display:inline">{{$n++}}:&nbsp;{{$todo->todo}}</p>
                        <a href="{{route('todo.delete',$todo->id)}}" class="btn btn-danger"
                           style="float:right">Delete</a>
                        <a href="{{route('todo.markAsComplete',$todo->id)}}" class="btn btn-success"
                           style="float:right">Done</a>

                        <!-- Button trigger modal -->

                        <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal"
                                data-target="#edit_model{{$todo->id}}">Edit
                        </button>

                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="edit_model{{$todo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="post" action="{{route('todo.update',$todo->id)}}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body text-center text-danger">
                                        <input type="text" name='todo' value="{{$todo->todo}}"
                                               class="col-9 form-control">


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">update</button>


                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>


                @endif
            </div>


        @endforeach
    </div>






    <div class="fixed-bottom back">
        <a href="/" class="btn btn-secondary">Back</a>
    </div>


@stop