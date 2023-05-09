<!DOCTYPE html>
<html>


@include('layouts.scripts')

<body>
  <!-- Navigation Bar -->
  @include('layouts.navBar')
  <div class='container'>
    <div class='jumbotron'>
        <div class="row">
          <div class="col-md-6">
            <h2>Edit Post</h2>
          </div>
        </div>
      </div>
      
  </div>
  <!-- Cards Grid -->
  <div class="container">
    <div class='jumbotron'>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <input type="hidden" name="previousImage" value="{{$post->image}}">
                <input type="hidden" name="postId" value="{{$post->id}}">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input value="{{$post->title}}" type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" value="{{$post->price}}" min="1" step="0.1" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                  <label for="currency">Currency Type</label>
                  <select class="form-control" id="currency" name="currency">
                    <option value="USD" @if ($post->currency_type == 'USD')
                        selected
                    @endif>USD</option>
                    <option value="GBP"
                    @if ($post->currency_type == 'GBP')
                        selected
                    @endif
                    >GBP</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">Image
                    <a href="/images/posts/{{$post->image}}" target="_blank">{{$post->image}}</a>
                  </label>
                  <input type="file" class="form-control-file" id="image" name="image" accept="image/*" >
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea class="form-control" id="content" name="content" rows="5" required> {{$post->content}}</textarea>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
              </form>
              
        </div>
    </div>
</div>
</div>

    
  </body>
  </html>
