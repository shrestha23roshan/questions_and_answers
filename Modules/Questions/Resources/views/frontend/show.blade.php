@include('layouts.frontend.header')

<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> 


@include('layouts.frontend.header')

<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> 



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Q & A</title>

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- Fontawesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
  </head>
  <body>
    <header>
      <div class="header_content">
        <div class="logo">
          <!-- <img src="" alt=""> -->
          <!-- <p>Q&A</p> -->
          <a href="">Q & A</a>
        </div>

        <ul>
          <a href="{{ route('home') }}" class="active">
            <li><i class="fas fa-home"></i></li>
          </a>
          <a href="">
            <li><i class="fas fa-bell"></i></li>
          </a>
          <a href="#" onclick="postQuestion()">
            <li><i class="fas fa-plus-square"></i></li>
          </a>
          <a href="">
            <li><i class="fas fa-users"></i></li>
          </a>
          <a href="{{route('profile.show')}}"> <i class="fas fa-user-alt"></i>
            @if(Route::has('login'))
                    @auth
                    @else
                    <li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
                    <li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
                    @endif
                @endif
          </a>
        </ul>

      </div>
    </header>

    <main>
        <section>
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Ask Question</h2><br><br><br>
                <div class="ml-auto">
               <button style="margin-left: 50px;"><a href="{{route('home')}}">Back To All Questions</a>  </button> 
               </div>
            </div>
          </div>
          
          <div class="container">
                <div class="row">
                    <h1>{{$question->title}}</h1>
                </div>
            
                <div class="row">
                    {!! $question->description !!}
                </div>
                
                <?php
                    foreach ($answers as $answer) {
                        // dd($answer->question_id);
                        if ($question->id == $answer->question_id) { ?>
                            <div class="row">
                                Answer  :   <span style="color:blue;"> {!! $answer->body !!} </span>
                            </div>
                            <div>
                                {{-- @if (Auth::user()->can('update',$question)) --}}
                                @can('update',$answer)
                                  <a href="{{ route('answers.edit', $answer->id) }}" title="Edit message"><button class="btn btn-primary btn-flat">Edit</i></button></a>&nbsp;
                                @endcan
                                @can('delete',$answer)
                                <form method="post" action="{{ route('answers.destroy', $answer->id) }}">
                                    {{method_field('DELETE')}}
            
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-flat" onclick="return confirm('Are You Sure Want To Delete ?')">Delete</button>
                                    </form>
                                @endcan
                                
                              </div>
                              <br>
                            <p>
                                Answered By :
                                <a href="{{ $answer->user->url }}">{{$answer->user->name}}</a>
                                <small class="text-muted">{{$answer->created_date}}</small>
                            </p>
            
                            
                    <?php   }
                    }
                ?>
                
                <br><br>
            
                @include('answers::frontend.create')
            
            
            </div>
     
    
        </section>
    </main>

    <div class="profile_section">
        <div class="profile">
          <img src="{{asset('img/profile.jpg')}}" alt="" />
          <div class="text_content">
            <h2 class="card_title">
              <a href="#">    
              @if(Route::has('login'))
                  @auth
                        <a title="My Account">{{Auth::user()->name}}</a><br><br>
                        <ul class="submenu curency" >
                            <li class="menu-item">
                                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fas fa-power-off"></i>Logout</a>
                            </li>
                            <form id="logout-form" method="POST" action="{{route('logout')}}">
                                @csrf
                            </form>
                        </ul>
                @else
                <li class="menu-item"  style="margin-left: 740px;"><a title="Register or Login" href="{{route('login')}}">Login</a></li>
                <li class="menu-item"  style="margin-left: 740px;"><a title="Register or Login" href="{{route('register')}}">Register</a></li>
                @endif

            @endif
              </a>
            </h2>
          </div>
        </div>
      </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <script>
      function postQuestion() {
        $("#postModal").modal("show");
      }
      // $("#postModal").click(function () {
      //   // alert("The paragraph was clicked.");
      //   console.log("ok");
      // });
    </script>
  </body>
</html>















