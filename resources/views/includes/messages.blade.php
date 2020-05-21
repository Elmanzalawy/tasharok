@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
        <div class="alert alert-success"  style="text-align:right;">
            {{session('success')}}
            <button type="button" class="close mx-2" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif

@if(session('error'))
        <div class="alert alert-danger" style="text-align:right;">
            {{session('error')}}
            <button type="button" class="close mx-2" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif