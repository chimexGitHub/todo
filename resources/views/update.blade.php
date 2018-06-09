@extends('layout')

@section('content')

    <div class="row">

        <div class="col-lg-12" class="form-control">

            <form action="{{route('todo.save', ['id'=>$todo->id])}}" method="post">
                {{csrf_field()}}
                    <input type="text" class="form-control input-lg" name="todo" value="{{$todo->todo}}" placeholder="Update Todos">
            </form>
        </div>
    </div>


@stop