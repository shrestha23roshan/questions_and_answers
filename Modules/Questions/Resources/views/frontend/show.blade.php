@include('layouts.frontend.header')

<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> 

<div class="card-header">
  <div class="d-flex align-items-center">
      <div class="ml-auto">
     <button><a href="{{route('home')}}">Back To All Questions</a>  </button> 
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
                        {!! $answer->body !!}
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
                <p>
                    Answered By :
                    <a href="{{ $answer->user->url }}">{{$answer->user->name}}</a>
                    <small class="text-muted">{{$answer->created_date}}</small>
                </p>

                
        <?php   }
        }
    ?>
    
    

    @include('answers::frontend.create')


</div>



