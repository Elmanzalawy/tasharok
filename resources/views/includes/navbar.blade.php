@if(!Auth::guest())
<li id="user-menu" class="">
    <a id="" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('تسجيل الخروج') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @if(!Auth::guest())
@if(Auth::user()->privilege == "admin")
          <a class="dropdown-item" href="{{ url('/faculties/create') }}">اضافة تخصص</a>
          <a class="dropdown-item" href="{{ url('/faculties/createBook') }}">اضافة كتاب</a>
          <a class="dropdown-item" href="{{ url('/faculties/createNews') }}">اضافة أعلان</a>
          <a class="dropdown-item" href="{{ url('/dashboard') }}">الأدارة</a>

@endif
@endif
    </div>
</li>
@endif

<nav class="navbar navbar-expand-lg ">

    <a class="navbar-brand" href="{{ url('/index') }}">
    <img src="{{url('images/logo2.png')}}" width="40" height="40" alt="">
      <b>تشارك</b>
    </a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav text-left">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/index') }}">الرئيسية <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/faculties/index')}}" id="" data-toggle="" aria-haspopup="true" aria-expanded="false">
          التخصصات</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/events/index')}}" id="" data-toggle="" aria-haspopup="true" aria-expanded="false">
          الدورات</span>
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{url('/summaries/index')}}" id="" data-toggle="" aria-haspopup="true" aria-expanded="false">
            الملخصات</span>
          </a>
        </li>
    <!--ABOUT US-->
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/about') }}">عنا</a>
      </li>
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="calculatorDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Calculators <span class="soon">Soon</span></a>
          <div class="dropdown-menu" aria-labelledby="calculatorDropdown">
            <a class="dropdown-item" href="lectureArchive1.php">General</a>
            <a class="dropdown-item" href="lectureArchive2.php">Civil</a>
            <a class="dropdown-item" href="{{ url('/calculators/electronics') }}">Electronics</a>
            <a class="dropdown-item" href="lectureArchive4.php">Chemistry</a>
          </div>
      </li> --}}
      {{-- @if(!Auth::guest())
      <li class="nav-item">
      <a href="{{url('/contact')}}" class="nav-link contact-us" >تواصل معنا</a>
      </li>
      @endif --}}
    
    </ul>

    {{-- <form class="form-inline">
      <input class="form-control mr-sm-2 ml-2" type="search" placeholder="بحث..." aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">بحث</button>
    </form> --}}

    {!! Form::open(['route' => 'search', 'class'=>'form-inline']) !!}

{!! Form::text('query','', ['class'=>'form-control mr-sm-2 ml-2', 'placeholder'=>'بحث...', 'autofill'=>'disabled']) !!}
{!! Form::submit('بحث',['class'=>'btn btn-outline-primary my-2 my-sm-0']) !!}

{!! Form::close() !!}

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav mr-auto">
      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('التسجيل') }}</a>
              </li>
          @endif
      @else
          {{-- <li id="user-menu" class="">
              <a id="" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('تسجيل الخروج') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

                  @if(!Auth::guest())
        @if(Auth::user()->privilege == "admin")
                    <a class="dropdown-item" href="{{ url('/faculties/create') }}">اضافة تخصص</a>
                    <a class="dropdown-item" href="{{ url('/faculties/createBook') }}">اضافة كتاب</a>
                    <a class="dropdown-item" href="{{ url('/faculties/createNews') }}">اضافة أعلان</a>

        @endif
    @endif
              </div>
          </li> --}}
      @endguest
  </ul>
    </div>
    </nav>

    <style>
#user-menu{
  position: fixed;
  top: 8px;
  left: 8px;
  background: var(--secondary-color);
  border-radius: 50%;
  padding: 2px;
  display: block !important;
  z-index: 9999;
}
    </style>