<!DOCTYPE html>
<html>

@include('layouts.scripts')

<body>
  <!-- Navigation Bar -->
  @include('layouts.navBar')

  <!-- Jumbotron with Name and Quote -->
  <div class='container'>
    <div class='jumbotron'>
      <h2>Eugene Hale's Images App</h2>
      <marquee behavior="scroll" direction="left">
        <quote>"Words have the power to inspire, to heal, and to create. Use them wisely and with intention, for they are the building blocks of your legacy."</quote>
      </marquee>
      
    </div>
  </div>

  <!-- Cards Grid -->
  <div class='container'>
    <div class='jumbotron'>
    <div class='row'>
      
      <div class='col-sm-12'>
        <div class='row'>
          <!-- Card #1 -->
          @forelse ($posts as $post)
              
            <div class='col-sm-4'>
              <div class='card'>
                <a href="{{route('posts.show', $post->id)}}">
                <img class='card-img-top' src='/images/posts/{{$post->image}}' alt='Card image cap'>
              </a>
                <div class='card-body'>
                  <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>Auther: {{$post->user->name}}</li>
                    <li class='list-group-item'>Posted On: {{\Carbon\Carbon::parse($post->created_at)->format('F j, Y g:ia')}}</li>
                    <li class='list-group-item'>Price: {{$post->price .' '. $post->currency_type}}</li>
                    <li class='list-group-item'>Views: {{$post->views}}</li>
                    <li class='list-group-item'>Comments: {{$post->comments->count()}}</li>
    
                  </ul>
                  <h4 class='card-title'>
                    @if(strlen($post->title) > 15)
                      {{ \Illuminate\Support\Str::limit($post->title, 15) }}
                    @else
                      {{ $post->title }}
                    @endif</h4>
                  <span class='card-text'>
                    @if(strlen($post->content) > 15)
                      {{ \Illuminate\Support\Str::limit($post->content, 15) }}
                    @else
                      {{ $post->content }}
                    @endif
                  </span>
                </div>
              </div>
            </div>
          @empty
              <span class="text text-danger"> No Post Found!</span>
          @endforelse

        </div>
        <div class="links">
          {{$posts->links()}}
        </div>
      </div>
      
    </div>
    </div>
  </div>
    
  </body>
  </html>
