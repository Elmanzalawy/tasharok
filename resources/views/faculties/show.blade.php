@extends('layouts.app')
@section('content')

<div class="container">
    <div class="jumbotron">
    {{-- <a class="btn btn-success" href="{{url('events')}}">Go back</a> --}}
    {{-- <h1 class="center">{{$faculty->name}}</h1> --}}
    <h1 class="center">الكتب</h1>
    <table class="table table-striped bg-light dark center text-center">
            <thead>
              <tr>
                <th scope="col">الأسم</th>
                <th scope="col">العدد</th>
                @if(!Auth::guest())
                @if(Auth::user()->privilege == "admin")
                  <th scope="col">الأدارة</th>
                @endif
                @endif
              </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
            <td>{{$book->name}}</td>
            <td>{{$book->number}}</td>
            @if(!Auth::guest())
            @if(Auth::user()->privilege == "admin")
            <td>
              {!!Form::open(['action'=>['AdminController@deleteBook', $book->id], 'method'=>'POST', 'class'=>'pull-left m-2'])!!}
              {{-- SPOOFING METHOD --}}
              {{Form::hidden('_method','DELETE')}}
              {{Form::submit('مسح الكتاب',['class'=>'btn btn-danger'])}}
          {!!Form::close()!!}
          
          <a href="#" class="btn btn-outline-primary pull-left  m-2" data-toggle="modal" data-target="#edit-book-{{$book->id}}">تعديل العدد</a>
        
        </td>
        @endif
        @endif
                </tr>

                @if(!Auth::guest())
            @if(Auth::user()->privilege == "admin")
                  <!--MODAL-->
       <div class="modal fade" id="edit-book-{{$book->id}}" tabindex="1" role="dialog" aria-labelledby="lecturepleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="LectureModalLabel">تعديل العدد</h5>

              </div>
              <div class="modal-body">
                 
                  {!!Form::open(['action'=>['AdminController@editBook', $book->id], 'method'=>'POST', 'class'=>'pull-left m-2'])!!}
                  {{-- SPOOFING METHOD --}}
                  
                  {{Form::hidden('_method','DELETE')}}
                  
                  <div class="form-group">
                      {{Form::number('number','',['class'=>'form-control','placeholder'=>'العدد'])}}
                  </div>
                 <div class="form-group">
                    {{Form::submit('تعديل',['class'=>'form-control btn btn-outline-primary'])}}
                 </div>
              {!!Form::close()!!}
              </div>
            </div>
         </div>
     </div>
     @endif
     @endif
            @endforeach
            </tbody>
          </table>
            
</div>
</div>

@endsection



