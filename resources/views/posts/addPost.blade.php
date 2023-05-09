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
            <h2>Add New Post</h2>
          </div>
        </div>
      </div>
      
  </div>
  <!-- Cards Grid -->
  <div class="container">
    <div class='jumbotron'>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" min="1" step="0.1" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                  <label for="currency">Currency Type</label>
                  <select class="form-control" id="currency" name="currency">
                    <option value="USD">USD</option>
                    <option value="GBP">GBP</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.jpeg,.png" maxlength="1048576" required>
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              
        </div>
    </div>
</div>
</div>

    
  </body>
  </html>
