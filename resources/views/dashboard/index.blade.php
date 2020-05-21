@extends('layouts.app')

@section('content')
<div class="container ">


    <h1 class="my-4 text-center" style="margin-top:3rem !important; font-family:Amiri; font-size:45px !important;">
        الأدارة</h1>
        <hr>
        <h5 class="center">الأعلانات</h5>
        <table class="table table-striped bg-light dark center text-center">
            <thead>
              <tr>
                <th scope="col">الأسم</th>
              </tr>
            </thead>
            <tbody>
            @foreach($newsArray as $news)
            <td><a href="{{url('storage/news_images/'.$news->image)}}" target="_blank">{{$news->title}}</a>

            {!!Form::open(['action'=>['AdminController@deleteNews', $news->id], 'method'=>'POST', 'class'=>'pull-left'])!!}
                {{-- SPOOFING METHOD --}}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('مسح الأعلان',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}

            </td>
                </tr>
            @endforeach

            </tbody>
          </table>

          <br>

          <h5 class="center">الدورات</h5>
        <table class="table table-striped bg-light dark center text-center">
            <thead>
              <tr>
                <th scope="col">الأسم</th>
              </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
            <td><a href="{{url('storage/event_images/'.$event->cover_image)}}" target="_blank">{{$event->title}}</a>

            {!!Form::open(['action'=>['AdminController@deleteEvent', $event->id], 'method'=>'POST', 'class'=>'pull-left'])!!}
                {{-- SPOOFING METHOD --}}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('مسح الدورة',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}

            </td>
                </tr>
            @endforeach

            </tbody>
          </table>

          <br>

          <h5 class="center">الملخصات</h5>
        <table class="table table-striped bg-light dark center text-center">
            <thead>
              <tr>
                <th scope="col">الأسم</th>
              </tr>
            </thead>
            <tbody>
            @foreach($summaries as $summary)
            <td><a href="{{url('storage/summaries/'.$summary->filename)}}" target="_blank">{{$summary->title}}</a>

            {!!Form::open(['action'=>['AdminController@deleteSummary', $summary->id], 'method'=>'POST', 'class'=>'pull-left'])!!}
                {{-- SPOOFING METHOD --}}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('مسح الملخص',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}

            </td>
                </tr>
            @endforeach

            </tbody>
          </table>


</div>
<style>
    /* #main-footer {
        position: static !important;
    }
.row .card{
  margin-bottom: 2rem;
}

.
faculty-link .card:hover{
    background: var(--secondary-color) !important;
    transition: background 0.35s ease-in-out;
} */
body{
    padding-bottom: 4rem;
}
</style>
@endsection
