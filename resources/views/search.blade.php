@extends('layouts.app')
@section('content')
<style>
body{
    margin-bottom:6rem;
}
</style>
<div class="container">
    <div class="jumbotron">
            <h1 class="center my-4">نتائج البحث</h1>

            @if(count($faculties))   
                <h3 class="center">التخصصات</h3>    
                <table class="table table-striped bg-light dark center text-center">
                        <thead>
                          <tr>
                            <th scope="col">التخصص</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($faculties as $faculty)
                        <td>{{$faculty->name}}</td>
                            </tr>
                        @endforeach
            
                        </tbody>
                      </table>     
            @endif

            @if(count($books))   
            <hr>
                <h3 class="center">الكتب</h3>    
                <table class="table table-striped bg-light dark center text-center">
                        <thead>
                          <tr>
                            <th scope="col">الاسم</th>
                            <th scope="col">التخصص</th>
                            <th scope="col">العدد</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                        <td>{{$book->name}}</td>
                        <td>{{$book->category}}</td>
                        <td>{{$book->number}}</td>
                            </tr>
                        @endforeach
            
                        </tbody>
                      </table>     
            @endif
            
            @if(count($summaries))   
            <hr>
                <h3 class="center">الملخصات</h3>    
                <table class="table table-striped bg-light dark center text-center">
                        <thead>
                          <tr>
                            <th scope="col">الاسم</th>
                            <th scope="col">التخصص</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($summaries as $summary)
                        <td>{{$summary->title}}</td>
                        <td>{{$summary->category}}</td>
                            </tr>
                        @endforeach
            
                        </tbody>
                      </table>     
            @endif
    </div>
</div>
@endsection