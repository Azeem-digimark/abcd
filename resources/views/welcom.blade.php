<!DOCTYPE html>
<html>

@include('layouts.scripts')

<body>
  <!-- Navigation Bar -->
  @include('layouts.navBar')

  <!-- Jumbotron with Name and Quote -->
  <div class='container'>
    <div class='jumbotron'>
      <h1>John Dow</h1>
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
          <div class='col-sm-4'>
            <div class='card'>
              <img class='card-img-top' src='https://picsum.photos/id/1019/300/200' alt='Card image cap'>
              <div class='card-body'>
                <h4 class='card-title'>Card Title 1</h4>
                <p class='card-text'>Card Description 1</p>
              </div>
              <ul class='list-group list-group-flush'>
                <li class='list-group-item'>Views: 100</li>
              </ul>
            </div>
          </div>

          <!-- Card #2 -->
          <div class='col-sm-4'>
            <div class='card'>
              <img class='card-img-top' src='https://picsum.photos/id/1022/300/200' alt='Card image cap'>
              <div class='card-body'>
                <h4 class='card-title'>Card Title 2</h4>
                <p class='card-text'>Card Description 2</p>
              </div>
              <ul class='list-group list-group-flush'>
                <li class='list-group-item'>Views: 200</li>
              </ul>
            </div>
          </div>

          <!-- Card #3 -->
          <div class='col-sm-4'>
            <div class='card'>
              <img class='card-img-top' src='https://picsum.photos/id/1024/300/200' alt='Card image cap'>
              <div class='card-body'>
                <h4 class='card-title'>Card Title 3</h4>
                <p class='card-text'>Card Description 3</p>
              </div>
              <ul class='list-group list-group-flush'>
                <li class='list-group-item'>Views: 300</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    </div>
  </div>
    
  </body>
  </html>
