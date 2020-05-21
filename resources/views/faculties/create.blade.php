@extends('layouts.app')
@section('content')

<div class="container">
    <div class="jumbotron bg-none">
        <h1 class="text-center">أضافة تخصص</h1>
            {{ Form::open(['action' => 'FacultiesController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
            <div class="form-group">
                {{Form::label('name','أسم التخصص',['class'=>'pull-right'])}}
                {{Form::text('name','',['class'=>'form-control','placeholder'=>'الأسم'])}}
            </div>
    
            {{-- <div class="form-group">
                    {{Form::label('Add image: ','أضافة صورة',['class'=>'pull-right'])}}
                    {{Form::file('image',['class'=>'pull-right'])}}
            </div><br> --}}
    <br>
            {{Form::submit('تأكيد',['class'=>'btn btn-primary'])}}
        {{ Form::close() }}
    </div>
</div>
@endsection