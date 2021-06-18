@include('layouts.frontend.header')

<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> 

<div class="card-header">
  <div class="d-flex align-items-center">
      <h2>Edit Question</h2>
      <div class="ml-auto">
     <button><a href="{{route('home')}}">Back To All Questions</a>  </button> 
     </div>
  </div>
</div>

<div class="container">
  <form method="POST" action="{{ route('ask.update',$question->id) }}" enctype="multipart/form-data">
    @csrf
    @include('layouts.alert')
    {{method_field('PUT')}}

    <div class="row">
        <label for="title">Title <span style="color:red;"> *</span></label>
        <input type="text" id="title" name="title" value="{{$question->title}}" placeholder="Title of the question">
    </div>

    <div class="row">
        <label for="description">Description</label>
        <textarea name="description" id="description">{!! $question->description !!}</textarea><script> CKEDITOR.replace( 'description' );</script>
    </div>

    <br>
    <div class="row">
      <input type="submit" value="Update">
    </div>

  </form>
</div>



