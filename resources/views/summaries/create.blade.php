@extends('layouts.app')
@section('content')
<style>
#main-footer{
    
}
</style>
<div class="container">
    <div class="jumbotron bg-none">
            {{ Form::open(['action' => 'SummariesController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
            <div class="form-group">
                {{Form::label('title','اسم الملخص')}}
                {{Form::text('title','',['class'=>'form-control','placeholder'=>'اسم الملخص'])}}
            </div>

    
            {{-- <div class="form-group">
                    {{Form::label('title','التخصص')}}
                    <select class="form-control" id="select-subject" name="category">
                            <!-- level 1 subjects-->
                           @foreach ($faculties as $faculty)
                           <option class="level-1 general" value="{{$faculty->name}}">{{$faculty->name}}</option>
                           @endforeach
                         </select>
            </div>
     --}}
            <div class="form-group">
                    {{Form::label('Add file: ','اضافة ملف')}}
                    {{Form::file('summary')}}
            </div>
    
            {{Form::submit('تأكيد',['class'=>'btn btn-primary'])}}
        {{ Form::close() }}
    </div>
</div>
@endsection