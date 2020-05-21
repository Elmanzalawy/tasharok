@extends('layouts.app')
@section('content')
<style>

</style>

<div class="container">
    <div class="jumbotron " style="margin-bottom:8rem !important;">
    <h1 style="" class="center">المخلصات</h1>
    @if(!Auth::guest())
    {{-- @if(Auth::user()->privilege == "admin") --}}
        <a class="btn btn-lg btn-primary" href="{{ url('/summaries/create') }}">اضافة ملخص</a>
    {{-- @endif --}}
@endif
    @if(count($summaries) > 0)
        @foreach($summaries as $summary)
        @if($summary->status=='declined' && Auth::user()->privilege == "admin")
            <div class="card p-3 my-2 mb-4">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    {{-- <a href="../storage/summaries/{{$summary->filename}}" target="_blank"><img style="width:100%;" src="../images/pdf-logo.png" alt=""></a> --}}
                    </div>
                    <div class="col-md-12 col-sm-12 text-center">
                        <h3> <a href="../storage/summaries/{{$summary->filename}}" target="_blank">{{$summary->title}}<a></h3>
                        {{-- <p style="background:lavender;padding:5px;border-radius:10px;">{{$summary->category}}</p> --}}
                        {{-- <p>تاريخ الدورة: {{$summary->event_date}}</p> --}}

<br>

            {{-- DELETE SUMMARY --}}
            {!!Form::open(['action'=>['SummariesController@destroy', $summary->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                {{-- SPOOFING METHOD --}}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('رفض',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}

            {{-- ACCEPT SUMMARY --}}
            {!!Form::open(['action'=>['SummariesController@accept', $summary->id], 'method'=>'POST', 'class'=>'pull-right mr-2'])!!}
            {{-- {{Form::hidden('_method','DELETE')}} --}}
                {{Form::submit('قبول',['class'=>'btn btn-success'])}}
            {!!Form::close()!!}
                        {{-- <small>Created on {{$summary->created_at}}</small>                </div> --}}
                </div>
            </div>
    </div>
            @endif
        @endforeach
        @foreach($summaries as $summary)
        @if($summary->status=='accepted')
            <div class="card p-2 my-2 mb-4">
                <div class="row">
                    {{-- <div class="col-md-12 col-sm-12">
                    <a href="../storage/summaries/{{$summary->filename}}" target="_blank"><img style="width:100%;" src="../images/pdf-logo.png" alt=""></a>
                    </div> --}}
                    <div class="col-md-12 col-sm-12 text-center">
                        <h3> <a href="../storage/summaries/{{$summary->filename}}" target="_blank">{{$summary->title}}<a></h3>
                        {{-- <p style="background:lavender;padding:5px;border-radius:10px;">{{$summary->category}}</p> --}}
                        {{-- <p>تاريخ الدورة: {{$summary->event_date}}</p> --}}

                        {{-- <small>Created on {{$summary->created_at}}</small>                </div> --}}
                </div>
                </div>
            </div>
            @endif
        @endforeach
           {{-- <div class="center"> {{$summaries->links()}}</div> --}}
    @else
        <p class="text-center primary-color">لا توجد ملخصات.</p>
    @endif
</div>
</div>

@endsection