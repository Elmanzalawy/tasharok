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
              </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
            <td>{{$book->name}}</td>
            <td>{{$book->number}}</td>
                </tr>
            @endforeach

            </tbody>
          </table>
            
</div>
</div>
@endsection