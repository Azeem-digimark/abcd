<!DOCTYPE html>
<html lang="en">
    @include('layouts.scripts')
<body>
    <!-- Navigation Bar -->
  @include('layouts.navBar')
  <div class='container'>
    @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
          @endif
    <div class='jumbotron'>
      <h2>Auther: {{$post->user->name}} <small class="text-muted">Posted on {{\Carbon\Carbon::parse($post->created_at)->format('F j, Y g:ia')}}</small></h2>
      
    </div>
  </div>
    <div class="container mt-4">
        <div class="jumbotron">
        <div class="row">
          <div class="col-md-8">
            <img src="/images/posts/{{$post->image}}" class="img-fluid mb-3" alt="Dummy Image" height="400px" width="600px">
            <div class="row mt-2">
              
              <div class="col-md-6">
                <p>Price : {{$post->price.' '. $post->currency_type}} </p>
              </div>
              <div class="col-md-6 text-right">
                <p>{{$post->views}} views</p>
            </div>
            </div>
            <h2>{{$post->title}}</h2>
            <p>{{$post->content}}</p>
        </div>
          <div class="col-md-4">
              <h3>Comments ({{$post->comments->count()}})</h3>
              <hr>
              <div class="media">
                  <div class="media-body">
                    @forelse ($post->comments as $comment)  
                      <h4 class="mt-0">{{$comment->user->name}} <small class="text-muted">Commented on {{\Carbon\Carbon::parse($comment->created_at)->format('F j, Y g:ia')}}</small></h4>
                      <span class="mb-2">{{$comment->body}}</span>
                    @empty
                      <span class="mb-2 text text-danger">No Comments Yet!</span>
                    @endforelse

                      <form action="{{route('comments.store')}}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="postId" value="{{$post->id}}">
                        <div class="form-group">
                          <label for="comment">Comment:</label>
                          <textarea class="form-control" rows="3" id="comment" name="comment" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
              </div>
            </div>
          </div>
          
          
        </div>
      </div>
    </div>

</body>
</html>
