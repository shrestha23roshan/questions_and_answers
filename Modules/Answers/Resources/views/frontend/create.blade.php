<div class="container">
        <form method="POST" action="{{ route('answers.store') }}" enctype="multipart/form-data">
          @csrf
          @include('layouts.alert')
            <div class="row">
                <input name="question_id" value="{{$question->id}}" hidden>
            </div>

          <div class="row">
              <label for="body">Post Your Answer<span style="color:red;">*</span></label>
              {{-- <textarea name="body" id="body"></textarea><script> CKEDITOR.replace( 'body' );</script> --}}
              <textarea rows="7" name="body" placeholder="Enter Your Answer"></textarea>
          </div>
      
          <br>
          <div class="row">
            <input type="submit" value="Submit">
          </div>
        </form>
</div>