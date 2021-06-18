@include('layouts.frontend.header')

<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> 

<div class="card-header">
  <div class="d-flex align-items-center">
      <h2>Ask Question</h2>
      <div class="ml-auto">
     <button><a href="{{route('home')}}">Back To All Questions</a>  </button> 
     </div>
  </div>
</div>

<div class="container">
  <form method="POST" action="{{ route('ask.store') }}" enctype="multipart/form-data">
    @csrf
    @include('layouts.alert')

    <div class="row">
        <label for="title">Title <span style="color:red;"> *</span></label>
        <input type="text" id="title" name="title" value="{{old('title')}}" placeholder="Title of the question">
    </div>

    <div class="row">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea><script> CKEDITOR.replace( 'description' );</script>
    </div>

    <br>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>



