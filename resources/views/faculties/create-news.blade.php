@extends('layouts.app')
@section('content')
<style>
/* #main-footer{
    position: absolute;
    bottom: 0;
    width: 100%;
} */
body{
    margin-bottom: 8rem;
}
</style>
<div class="container">
    <div class="jumbotron bg-none">
        <h1 class="text-center">أضافة أعلان</h1>
            {{ Form::open(['action' => 'FacultiesController@storeNews', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
            <div class="form-group">
                {{Form::label('name','العنوان',['class'=>'pull-right'])}}
                {{Form::text('title','',['class'=>'form-control','placeholder'=>'العنوان'])}}
            </div>

            <div class="form-group">
                    {{Form::label('name','وصف الأعلان',['class'=>'pull-right'])}}
                    {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'وصف الأعلان (أختيارى)'])}}
                </div>

                <div class="form-group">
                        {{Form::label('Add image: ','اضافة صورة')}}
                        {{Form::file('image')}}
                </div>
    <br>
    
            {{Form::submit('تأكيد',['class'=>'btn btn-primary pull-right'])}}
        {{ Form::close() }}
    </div>
</div>
@endsection