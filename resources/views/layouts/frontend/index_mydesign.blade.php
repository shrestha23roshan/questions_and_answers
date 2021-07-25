@include('layouts.frontend.header')


<div class="col-12 col-md-4 col-lg-3">
    <div class="text-right" style="float:right;">
      <a class="button button1" href="{{ route('ask.create') }}">Ask Question ?</a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Questions</div>
                @include('layouts.alert')

                <div class="card-body">
                   @foreach ($questions as $question)
                       <div class="media">

                         <div class="d-flex flex-column counters">
                            <div class="vote">
                              <strong>{{$question->votes_count}}</strong>{{ Str::plural('vote',$question->votes_count) }}
                            </div>
                            <div class="status {{$question->status}}">
                                {{-- <strong>{{$question->answers}}</strong>{{ Str::plural('answer',$question->answers) }} --}}
                                <strong>{{$question->answers_count}}</strong>{{ Str::plural('answer',$question->answers_count) }}
                            </div>
                            <div class="view">
                                {{$question->views . "". Str::plural('view',$question->views) }}
                            </div>
                         </div>
                          <div class="media-body">
                            <h3 class="mt-0"><a href="{{ $question->url }}">{{$question->title}}</a></h3>
                            <p>
                              Asked By :
                              <a href="{{ $question->user->url }}">{{$question->user->name}}</a>
                              <small class="text-muted">{{$question->created_date}}</small>
                            </p>
                            <p> {!! $question->description !!}</p>
                          </div>
                          <div>
                            {{-- @if (Auth::user()->can('update',$question)) --}}
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
              {{-- Pagination --}}
        <div class="d-flex justify-content-center">
          {!! $questions->links() !!}
      </div>
        </div>
    </div>
</div>



