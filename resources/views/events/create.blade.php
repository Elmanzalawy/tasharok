@extends('layouts.app')
@section('content')
<style>
#main-footer{
    /* position: absolute; */
}
</style>
<div class="container">
    <div class="jumbotron bg-none">
            {{ Form::open(['action' => 'EventsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
            <div class="form-group">
                {{Form::label('title','اسم الدورة')}}
                {{Form::text('title','',['class'=>'form-control','placeholder'=>'اسم الدورة'])}}
            </div>
    
            <div class="form-group">
                    {{Form::label('title','تاريخ الدورة')}}
                    {{Form::date('event_date','',['class'=>'form-control','placeholder'=>'event_date'])}}
            </div>

    
            {{-- <div class="form-group">
                {{Form::label('description','وصف الدورة')}}
                {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'وصف الدورة'])}}
            </div> --}}
    
            <div class="form-group">
                    {{Form::label('Add image: ','اضافة صورة')}}
                    {{Form::file('cover_image')}}
            </div>
    
            {{Form::submit('تأكيد',['class'=>'btn btn-primary'])}}
        {{ Form::close() }}
    </div>
</div>
@endsection