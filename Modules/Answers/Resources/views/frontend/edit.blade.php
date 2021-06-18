@include('layouts.frontend.header')

<div class="container">
    <form method="POST" action="{{ route('answers.update',$answer->id) }}" enctype="multipart/form-data">
        @csrf
        @include('layouts.alert')
        {{method_field('PUT')}}
        {{-- <div class="row">
            <input name="question_id" value="{{$question->id}}" hidden>
        </div> --}}

      <div class="row">
          <label for="body">Edit Your Answer<span style="color:red;">*</span></label>
          <textarea rows="7" name="body"> {!! $answer->body !!}</textarea><script> CKEDITOR.replace('body');</script>
      </div>
  
      <br>
      <div class="row">
        <input type="submit" value="Update">
      </div>
    </form>
</div>