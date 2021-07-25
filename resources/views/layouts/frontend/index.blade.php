@include('layouts.frontend.header')

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
    <link rel="stylesheet" href="css/main.css" />
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
      <section class="post">
        <div class="post_content">
          <img src="img/profile.jpg" alt="" />
          <div onclick="postQuestion();"><a href="{{ route('ask.create') }}"> Ask Your Question Here?</div>
        </div>
      </section>

      <section>
        <div class="main_post">
          {{-- <div class="profile">
            <img src="img/profile.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="profile.html">Penny Doe</a>
              </h2>
              <small class="card_sub_title">1 Month ago</small>
              <a
                href=""
                class="follow_button"
                style="position: absolute; top: 2em; right: 0"
                >Maths</a
              >
            </div>
          </div> --}}
          {{-- <div class="text_content">
            <a href="single_post.html">
              <h2 class="section_title">Who is the father of C?</h2>
            </a>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
              repellat iusto officia quaerat! Iste maiores voluptate,
              exercitationem alias omnis modi in nostrum dolores. Dolorum fugit
              sunt molestiae hic qui quam earum! Veniam rerum pariatur facere
              voluptatum distinctio, dolorem cupiditate nesciunt?
              <a href="" class="see_more">See More</a>
            </p>
          </div> --}}
          <div class="card">
                <div class="card-header">All Questions</div>
                @include('layouts.alert')

                <div class="card-body">
                   @foreach ($questions as $question)
                       <div class="media">

                         {{-- <div class="d-flex flex-column counters">
                            <div class="vote">
                              <strong>{{$question->votes_count}}</strong>{{ Str::plural('vote',$question->votes_count) }}
                            </div>
                            <div class="status {{$question->status}}">
                                <strong>{{$question->answers_count}}</strong>{{ Str::plural('answer',$question->answers_count) }}
                            </div>
                         </div> --}}
                          <div class="media-body">
                            <h3 class="mt-0"><a href="{{ $question->url }}">{{$question->title}}</a></h3>
                            <p>
                              Asked By :
                              <a href="{{ $question->user->url }}">{{$question->user->name}}</a>
                              <small class="text-muted">{{$question->created_date}}</small>
                            </p>
                            <p> {!! $question->description !!} </p>
                          </div>
                          <div class="footer_content">
                                <div class="left_content">
                                  <a href="" title="Up Vote"
                                    >30<i class="fas fa-arrow-alt-circle-up"></i
                                  ></a>
                                  <a href="" title="Down Vote"
                                    ><i class="fas fa-arrow-alt-circle-down"></i>10</a
                                  >
                                  <a href="" style="padding-left: 1.5em" title="Total Views"
                                    ><i class="fas fa-eye"></i>{{$question->views . "". Str::plural('view',$question->views) }}</a
                                  >
                                </div>
                                <div class="right_content">
                                  <a href="" title="Total Comments"
                                    >50<i class="fas fa-comments"></i
                                  ></a>
                                </div>

                                @can('update',$question)
                                <a href="{{ route('ask.edit', $question->id) }}" title="Edit message"><button class="btn btn-primary btn-flat">Edit</i></button></a>&nbsp;
                              @endcan
                              @can('delete',$question)
                              <form method="post" action="{{ route('ask.destroy', $question->id) }}">
                                  {{-- {{@method('DELETE')}} --}}
                                  {{method_field('DELETE')}}
      
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-flat" onclick="return confirm('Are You Sure Want To Delete ?')">Delete</button>
                                  </form>
                              @endcan

                              </div>
                       </div>
                   @endforeach
                </div>
                
            </div>
    
        </div>
      </section>
    </main>

    <aside>
      <div class="aside_content">
        <div class="search_box">
          <i class="fas fa-search"></i>
          <form class="">
            <input
              class=""
              name="search"
              type="search"
              placeholder="Search your query"
              aria-label="Search"
            />
          </form>
        </div>

        <div class="profile_section">
          <div class="profile">
            <img src="img/profile.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="profile.html">    
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

        <div class="favourite_section">
          <h2 class="section_title">Your Favourites</h2>

          <div class="your_favourite">
            <a href="" class="capsule" title="Add to your favourite list"
              >Science</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Tech</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Arts</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Music</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Travel</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Hospitality</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Covid19</a
            >
          </div>
        </div>

        <div class="popular_section">
          <h2 class="section_title">Popular</h2>

          <div class="popular_content">
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Science</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Tech</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Arts</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Music</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Travel</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Hospitality</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Covid19</a
            >
          </div>
        </div>

        <div class="recommended_section">
          <h2 class="section_title">Recommended</h2>
          <div class="profile">
            <img src="img/profile3.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href=""
                  >Jane Doe
                  <i class="fas fa-check-circle"></i>
                </a>
              </h2>
              <p class="card_sub_title">Python Expert</p>
            </div>
            <a href="" class="follow_button">Follow</a>
          </div>
          <div class="profile">
            <img src="img/profile2.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="">Jenny Doe <i class="fas fa-check-circle"></i> </a>
              </h2>
              <p class="card_sub_title">Java Expert</p>
            </div>
            <a href="" class="follow_button">Follow</a>
          </div>
          <div class="profile">
            <img src="img/profile.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="">Penny Doe</a>
              </h2>
              <!-- <p class="card_sub_title">JavaScript Expert</p> -->
            </div>
            <a href="" class="follow_button">Follow</a>
          </div>
        </div>
      </div>
    </aside>

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
