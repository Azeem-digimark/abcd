<nav class='navbar navbar-default'>
    <div class='container'>
      <div class='navbar-header'>
        <a class='navbar-brand' href='#'>
            @auth
              Welcome Dear {{ Auth::user()->name }}!</a>
              
            @endauth 
      </div>
      <ul class='nav navbar-nav navbar-right'>
        @guest
          <li><a href='{{ route('login') }}'>Sign In</a></li>
          <li><a href='{{ route('register') }}'>Sign Up</a></li>
        @else
          @if (Auth::user()->role_id == 1 ||Auth::user()->role_id == 2)
          <li><a href='{{route('home')}}'>Home</a></li>
          <li><a href='{{route('posts.index')}}'>Posts</a></li>
          <li><a href='{{route('comments.index')}}'>Comments</a></li>
              
          @endif
          @if(Auth::user()->role_id == 1)
            <li><a href='{{route('allUsers')}}'>Users</a></li>
          @endif
          
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
          @endguest
      </ul>
    </div>
  </nav>