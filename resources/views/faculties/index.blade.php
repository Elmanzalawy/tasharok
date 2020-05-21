
@extends('layouts.app')

@section('content')
<div class="container ">


          <h1 class="my-4 text-center" style="margin-top:3rem !important; font-family:Amiri; font-size:45px !important;">التخصصات</h1>


    @foreach($faculties as $faculty)
    <a class="faculty-link" href="{{url('faculties/'.$faculty->id)}}" style="text-decoration:none;">
            <div class="card p-2 my-2 mb-4">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 text-center">
                        <h3> {{$faculty->name}}</h3>

                </div>
            </div>
        </div>
        </a>

        @endforeach


</div>
<style>
    #main-footer {
        position: static !important;
    }
.row .card{
  margin-bottom: 2rem;
}
body{
    padding-bottom: 4rem;
}
.faculty-link .card:hover{
    background: var(--secondary-color) !important;
    transition: background 0.35s ease-in-out;
}
</style>
@endsection
