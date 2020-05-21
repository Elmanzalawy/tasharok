@extends('layouts.app')
@section('content')

<div class="container">
    <div class="jumbotron bg-none">
        <h1 class="text-center">أضافة كتاب</h1>
            {{ Form::open(['action' => 'FacultiesController@storeBook', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
            <div class="form-group">
                {{Form::label('name','اسم الكتاب',['class'=>'pull-right'])}}
                {{Form::text('name','',['class'=>'form-control','placeholder'=>'الأسم'])}}
            </div>

            <div class="form-group">
                    {{Form::label('title','التخصص',['class'=>'pull-right'])}}
                    <select class="form-control" id="select-subject" name="category">
                            <!-- level 1 subjects-->
                           @foreach ($faculties as $faculty)
                           <option class="level-1 general" value="{{$faculty->name}}">{{$faculty->name}}</option>
                           @endforeach
                         </select>
            </div>

            <div class="form-group">
                    {{Form::label('number','عدد الكتب',['class'=>'pull-right'])}}
                    {{Form::number('number','',['class'=>'form-control','placeholder'=>'عدد الكتب..'])}}
                </div>
    <br>
    
            {{Form::submit('تأكيد',['class'=>'btn btn-primary pull-right'])}}
        {{ Form::close() }}
    </div>
</div>
@endsection